<?php
// src/Controller/ArticlesController.php
declare(strict_types=1);

namespace App\Controller;

class JobsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
    }

    public function index()
    {
        $this->paginate = [
            'limit' => 50,
        ];
        $jobs = $this->paginate($this->Jobs);
        $this->set(compact('jobs'));
    }

    public function add()
    {
        $job = $this->Jobs->newEmptyEntity();
        if ($this->request->is('post'))
        {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());

            if ($this->Jobs->save($job))
            {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set('job', $job);
    }

    public function edit($id)
    {
        $job = $this->Jobs->findById($id)->firstOrFail();
        if ($this->request->is(['post', 'put']))
        {
            $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job))
            {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set('job', $job);
    }

    public function delete($id)
    {
        $this->request->allowMethod('post', 'delete');

        $job = $this->Jobs->findById($id)->firstOrFail();
        if ($this->Jobs->delete($job))
        {
            $this->Flash->success(__('The job has beend deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
