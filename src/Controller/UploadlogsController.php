<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Uploadlogs Controller
 *
 * @property \App\Model\Table\UploadlogsTable $Uploadlogs
 * @method \App\Model\Entity\Uploadlog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UploadlogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Jobs'],
            'limit' => 50,
        ];
        $uploadlogs = $this->paginate($this->Uploadlogs);

        $this->set(compact('uploadlogs'));
    }

    public function index2($uploaded = null)
    {
        $this->paginate = [
            'contain' => ['Jobs', 'Sendlogs'],
            'limit' => 50,
        ];
        if (is_null($uploaded))
        {
            $uploaded = date("Y-m-d");
        }
        $uploadlogs = $this->paginate($this->Uploadlogs->find()
            ->where(['uploaded >=' => $uploaded, 'uploaded <' => (new \DateTime($uploaded))->modify('+1 day')]));

        $this->set(compact('uploaded', 'uploadlogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Uploadlog id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $uploadlog = $this->Uploadlogs->get($id, [
            'contain' => ['Jobs', 'Sendlogs'],
        ]);

        $this->set(compact('uploadlog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $uploadlog = $this->Uploadlogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $uploadlog = $this->Uploadlogs->patchEntity($uploadlog, $this->request->getData());
            if ($this->Uploadlogs->save($uploadlog)) {
                $this->Flash->success(__('The uploadlog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uploadlog could not be saved. Please, try again.'));
        }
        $jobs = $this->Uploadlogs->Jobs->find('list', ['limit' => 200])->all();
        $this->set(compact('uploadlog', 'jobs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Uploadlog id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $uploadlog = $this->Uploadlogs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $uploadlog = $this->Uploadlogs->patchEntity($uploadlog, $this->request->getData());
            if ($this->Uploadlogs->save($uploadlog)) {
                $this->Flash->success(__('The uploadlog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uploadlog could not be saved. Please, try again.'));
        }
        $jobs = $this->Uploadlogs->Jobs->find('list', ['limit' => 200])->all();
        $this->set(compact('uploadlog', 'jobs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Uploadlog id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $uploadlog = $this->Uploadlogs->get($id);
        if ($this->Uploadlogs->delete($uploadlog)) {
            $this->Flash->success(__('The uploadlog has been deleted.'));
        } else {
            $this->Flash->error(__('The uploadlog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function export($uploaded = null)
    {
        $fp = fopen('php://temp/maxmemory:'.(5*1024*1024), 'a');

        if (is_null($uploaded))
        {
            $uploaded = date("Y-m-d");
        }
        $rows = $this->Uploadlogs->find()
            ->contain('Jobs', 'Sendlogs')
            ->where(['uploaded >=' => $uploaded, 'uploaded <' => (new \DateTime($uploaded))->modify('+1 day')]);

        fputcsv($fp, ['status', 'modified', 'job_id', 'ctifile', 'wavfile', 'status', 'disposition'], ",");
        foreach($rows as $row)
        {
            fputcsv($fp, [$row->has('sendlog') ? $row->sendlog->status : '',
                          $row->has('sendlog') ? $row->sendlog->modified : '',
                          $row->has('job') ? $row->job->name : '',
                          $row->ctifile,
                          $row->wavfile,
                          $row->status,
                          $row->disposition], ",");
        }

        rewind($fp);
        $csv = stream_get_contents($fp);
        
		// •¶ŽšƒR[ƒh‚Ì•ÏŠ·
        $csv =  mb_convert_encoding($csv, "CP932", "UTF-8");
		$csv =  preg_replace("/\n/", "\r\n", $csv);

        $filename = rawurlencode("uploadlogs.csv");

        $this->autoRender = false;

        return $this->response->withType('csv')
            ->withHeader('Content-Disposition', "attachment;filename*=UTF-8''{$filename}")
            ->withStringBody($csv);
    }
}
