<?php
// src/Controller/SvmappingsController.php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class SvmappingsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
    }
	
    public function index()
    {
        $job_id = $this->request->getQuery('job_id');
        $agentpbxid = $this->request->getQuery('agentpbxid');
        $agentid = $this->request->getQuery('agentid');
        $agentname = $this->request->getQuery('agentname');

        $param = $this->Svmappings->newEmptyEntity();
        $param["job_id"] = $job_id;
        $param["agentpbxid"] = $agentpbxid;
        $param["agentid"] = $agentid;
        $param["agentname"] = $agentname;

        $this->set(compact('param'));

		/**
        $param = $this->request->getData();

        if ($this->request->is('post')) {
            $job_id = $param['job_id'];
            $agentpbxid = $param['agentpbxid'];
            $agentid = $param['agentid'];
            $agentname = $param['agentname'];
        }
        **/
		
        $condition = [];

		if (!empty($job_id) && strcmp($job_id, ' ') != 0){
            $condition['job_id ='] = $job_id;
        }
		if (!empty($agentpbxid)){
            $condition['agentpbxid ='] = $agentpbxid;
        }
		if (!empty($agentid)){
            $condition['agentid ='] = $agentid;
        }
		if (!empty($agentname)){
            $condition['agentname ='] = $agentname;
        }
		
        $this->paginate = [
            'contain' => ['Jobs'],
            'limit' => 50,
        ];
        $svmappings = $this->paginate($this->Svmappings->find()->where($condition));

        $jobs = $this->Svmappings->Jobs->find('list')->toArray();
        $jobs = [' '=>'ALL'] + $jobs;
        $this->set(compact('svmappings', 'jobs'));
    }

    public function index2($job_id)
    {
        $this->paginate = [
            'contain' => ['Jobs'],
            'limit' => 50,
        ];
        $svmappings = $this->paginate($this->Svmappings->find()->where(['job_id =' => $job_id]));

        $this->set(compact('svmappings'));
    }

    public function add()
    {
        $svmapping = $this->Svmappings->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $svmapping = $this->Svmappings->patchEntity($svmapping, $this->request->getData());
            if ($this->Svmappings->save($svmapping)) {
                $this->Flash->success(__('The svmapping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The svmapping could not be saved. Please, try again.'));
        }
        
        $jobs = $this->Svmappings->Jobs->find('list');
        $this->set(compact('svmapping', 'jobs'));
    }

    public function edit($id = null)
    {
        $svmapping = $this->Svmappings->get($id, ['contain' => [], ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $svmapping = $this->Svmappings->patchEntity($svmapping, $this->request->getData());
            if ($this->Svmappings->save($svmapping)) {
                $this->Flash->success(__('The svmapping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The svmapping could not be saved. Please, try again.'));
        }

        $jobs = $this->Svmappings->Jobs->find('list');
        $this->set(compact('svmapping', 'jobs'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $svmapping = $this->Svmappings->get($id);
        if ($this->Svmappings->delete($svmapping)) {
            $this->Flash->success(__('The svmapping has been deleted.'));
        } else {
            $this->Flash->error(__('The svmapping could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function import($job_id)
    {
        $svmapping = $this->Svmappings->newEmptyEntity();
        $svmapping["job_id"] = $job_id;
        if ($this->request->is('post'))
        {
			$file = $this->request->getData('file');
			$filePath = '../webroot/tmp/' . date('YmdHis') . $file->getClientFilename();
			$file->moveTo($filePath);

			// 文字コードの変換
			$sjis = file_get_contents($filePath);
			$utf8 = mb_convert_encoding($sjis, 'UTF-8', 'CP932');
			$utf8 =  preg_replace("/\r\n/", "\n", $utf8);
			file_put_contents($filePath, $utf8);

            $f = fopen($filePath, "r");

            $mappings = [];
            $i = 0;
            $err = false;
            
            while($line = fgetcsv($f, 0, ','))
             {
                if ($i == 0)
                {
					if (strcasecmp($line[0], 'jobname') != 0) {
			            $this->Flash->error('ヘッダーが存在しません。');
                        $err = true;
						break;
					}
                    $i++;
                    continue;
                }
                $mapping = [];
                foreach ($line as $col)
                {
                    $mapping[] = $col;
                }
                $mappings[] = $mapping;
                $i++;
            }

            foreach ($mappings as $mapping)
            {
                // agentpbxid 6桁半角数字
                $svmapping['agentpbxid'] = $mapping[1];
                if (!preg_match('/^\d{6}$/', $mapping[1])) {
                    $this->Flash->error("agentpbxid error. agentpbxid = {$mapping[1]}");
                    $err = true;
                }
                // agentname 半角or全角のスペース
                if (!preg_match('/[ 　]+/u', $mapping[2])) {
                    $this->Flash->error("agentname error. agentpbxid = {$mapping[1]}");
                    $err = true;
                }
                // supervisorname 半角or全角のスペース
                if (!preg_match('/[ 　]+/u', $mapping[3])) {
                    $this->Flash->error("supervisorname error. agentpbxid = {$mapping[1]}");
                    $err = true;
                }
            }

            if ($err == false) {

                $connection = ConnectionManager::get('default');
                $connection->begin();

                $this->Svmappings->deleteAll(['job_id' => $job_id]);

                foreach ($mappings as $mapping)
                {
                    $svmapping = $this->Svmappings->newEmptyEntity();
                    $svmapping['agentpbxid'] = $mapping[1];
                    $svmapping['agentname'] = $mapping[2];
                    $svmapping['supervisorname'] = $mapping[3];
                    $svmapping['agentid'] = $mapping[4];
                    $svmapping['job_id'] = $job_id;
                    $this->Svmappings->save($svmapping);
                }
                $connection->commit();
                $this->Flash->success(__('The svmapping has been imported.'));
            }
        }
        
        $jobs = $this->Svmappings->Jobs->find('list');
        $this->set(compact('svmapping', 'jobs'));
    }

    public function export($job_id)
    {
		$rows = $this->Svmappings->find("all", ['contain' => ['Jobs'],
												'conditions' => ['job_id' => $job_id]])->all();

        $job = $this->Svmappings->Jobs->get($job_id);

		$fp = fopen('php://temp/maxmemory:'.(5*1024*1024), 'a');

		fputcsv($fp, ['JobName', 'AgentPbxId', 'AgentName', 'SupervisorName', 'AgentID'], ",");
		foreach($rows as $row)
		{
			fputcsv($fp, [$row->has('job') ? $row->job->name : '',
						  $row->agentpbxid,
						  $row->agentname,
						  $row->supervisorname,
						  $row->agentid], ",");
		}

		rewind($fp);
		$csv = stream_get_contents($fp);

		// 文字コードの変換
        $csv =  mb_convert_encoding($csv, "CP932", "UTF-8");
		$csv =  preg_replace("/\n/", "\r\n", $csv);

		$filename = rawurlencode("svmapping_{$job->name}.csv");

		$this->autoRender = false;

		return $this->response->withType('csv')
			->withHeader('Content-Disposition', "attachment;filename*=UTF-8''{$filename}")
			->withStringBody($csv);
    }
} 