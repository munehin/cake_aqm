<?php
// src/Controller/JobmappingsController.php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class JobmappingsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
    }

    public function index()
    {
        $job_id = $this->request->getQuery('job_id');
        $extension = $this->request->getQuery('extension');
        $areacode = $this->request->getQuery('areacode');
        $centercode = $this->request->getQuery('centercode');

        $param = $this->Jobmappings->newEmptyEntity();
        $param["job_id"] = $job_id;
        $param["extension"] = $extension;
        $param["areacode"] = $areacode;
        $param["centercode"] = $centercode;

        $this->set(compact('param'));

		/**
        if ($this->request->is('post')) {
            $job_id = $param['job_id'];
            $extension = $param['extension'];
            $areacode = $param['areacode'];
            $centercode = $param['centercode'];
        }
        **/

        $condition = [];

		if (!empty($job_id) && strcmp($job_id, ' ') != 0){
            $condition['job_id ='] = $job_id;
        }
		if (!empty($extension)){
            $condition['extension ='] = $extension;
        }
		if (!empty($areacode)){
            $condition['areacode ='] = $areacode;
        }
		if (!empty($centercode)){
            $condition['centercode ='] = $centercode;
        }
		
        $this->paginate = [
            'contain' => ['Jobs'],
            'limit' => 50,
        ];
        $jobmappings = $this->paginate($this->Jobmappings->find()->where($condition));
        
        $jobs = $this->Jobmappings->Jobs->find('list')->toArray();
        $jobs = [' '=>'ALL'] + $jobs;
        $this->set(compact('jobmappings', 'jobs'));

    }
    
    public function index2($job_id)
    {
        $this->paginate = [
            'contain' => ['Jobs'],
            'limit' => 50,
        ];
        $jobmappings = $this->paginate($this->Jobmappings->find()->where(['job_id =' => $job_id]));
        
        $this->set(compact('jobmappings'));
    }

    public function add()
    {
        $jobmapping = $this->Jobmappings->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $jobmapping = $this->Jobmappings->patchEntity($jobmapping, $this->request->getData());
            if ($this->Jobmappings->save($jobmapping)) {
                $this->Flash->success(__('The jobmapping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jobmapping could not be saved. Please, try again.'));
        }

        $jobs = $this->Jobmappings->Jobs->find('list');
        $this->set(compact('jobmapping', 'jobs'));

		//$areacodes = $this->Jobmappings->find('all', ['fields' => 'Jobmappings.areacode'])
        //                ->distinct('Jobmappings.areacode')->all();
        //$this->set(compact('areacodes'));
    }

    public function edit($id = null)
    {
        $jobmapping = $this->Jobmappings->get($id, ['contain' => [], ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobmapping = $this->Jobmappings->patchEntity($jobmapping, $this->request->getData());
            if ($this->Jobmappings->save($jobmapping)) {
                $this->Flash->success(__('The jobmapping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jobmapping could not be saved. Please, try again.'));
        }

        $jobs = $this->Jobmappings->Jobs->find('list');
        $this->set(compact('jobmapping', 'jobs'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobmapping = $this->Jobmappings->get($id);
        if ($this->Jobmappings->delete($jobmapping)) {
            $this->Flash->success(__('The jobmapping has been deleted.'));
        } else {
            $this->Flash->error(__('The jobmapping could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function import($job_id)
    {
        $jobmapping = $this->Jobmappings->newEmptyEntity();
        $jobmapping["job_id"] = $job_id;
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
					if (strcasecmp($line[0], 'extension') != 0) {
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
                // extension 最小1桁、最大6桁半角数字
                if (!preg_match('/^\d{1,6}$/', $mapping[0])) {
                    $this->Flash->error("extension error. extension = {$mapping[0]}");
                    $err = true;
                }
                // jobname 半角全角英数スペース
                if (!preg_match('/^[a-zA-Z0-9 ａ-ｚＡ-Ｚ０-９　]+$/u', $mapping[1])) {
                    $this->Flash->error("jobname error. extension = {$mapping[0]}");
                    $err = true;
                }
                // clientcode 半角数字
                if (!preg_match('/^\d+$/', $mapping[2])) {
                    $this->Flash->error("clientcode error. extension = {$mapping[0]}");
                    $err = true;
                }
                // areacode 半角数宇
                if (!preg_match('/^\d+$/', $mapping[4])) {
                    $this->Flash->error("areacode error. extension = {$mapping[0]}");
                    $err = true;
                }
            }

            if ($err == false) {

                $connection = ConnectionManager::get('default');
                $connection->begin();

                $this->Jobmappings->deleteAll(['job_id' => $job_id]);

                foreach ($mappings as $mapping)
                {
                    $jobmapping = $this->Jobmappings->newEmptyEntity();
                    $jobmapping['extension'] = $mapping[0];
                    $jobmapping['clientcode'] = $mapping[2];
                    $jobmapping['subjob'] = $mapping[3];
                    $jobmapping['areacode'] = $mapping[4];
                    $jobmapping['areaname'] = $mapping[5];
                    $jobmapping['centercode'] = $mapping[6];
                    $jobmapping['centername'] = $mapping[7];
                    $jobmapping['job_id'] = $job_id;
                    $this->Jobmappings->save($jobmapping);
                }
                $connection->commit();
                $this->Flash->success(__('The jobmapping has been imported.'));
            }
        }
        
        $jobs = $this->Jobmappings->Jobs->find('list');
        $this->set(compact('jobmapping', 'jobs'));
    }
    
    public function export($job_id)
    {
        $rows = $this->Jobmappings->find("all", ['contain' => ['Jobs'],
                                                 'conditions' => ['job_id' => $job_id]])->all();

        $job = $this->Jobmappings->Jobs->get($job_id);

        $fp = fopen('php://temp/maxmemory:'.(5*1024*1024), 'a');

        fputcsv($fp, ['Extension', 'JobName', 'ClientCode', 'Subjob', 'AreaCode', 'AreaName', 'CenterCode', 'CenterName'], ",");
        foreach($rows as $row)
        {
            fputcsv($fp, [$row->extension,
                          $row->has('job') ? $row->job->name : '',
                          $row->clientcode,
                          $row->subjob,
                          $row->areacode,
                          $row->areaname,
                          $row->centercode,
                          $row->centername], ",");
        }

        rewind($fp);
        $csv = stream_get_contents($fp);
        
		// 文字コードの変換
        $csv =  mb_convert_encoding($csv, "CP932", "UTF-8");
		$csv =  preg_replace("/\n/", "\r\n", $csv);

        $filename = rawurlencode("jobmapping_{$job->name}.csv");

        $this->autoRender = false;

        return $this->response->withType('csv')
            ->withHeader('Content-Disposition', "attachment;filename*=UTF-8''{$filename}")
            ->withStringBody($csv);
    }
} 