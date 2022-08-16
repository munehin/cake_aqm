<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sendlogs Controller
 *
 * @property \App\Model\Table\SendlogsTable $Sendlogs
 * @method \App\Model\Entity\Sendlog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SendlogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Uploadlogs'],
            'limit' => 50,
        ];
        $sendlogs = $this->paginate($this->Sendlogs);

        $this->set(compact('sendlogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Sendlog id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sendlog = $this->Sendlogs->get($id, [
            'contain' => ['Uploadlogs'],
        ]);

        $this->set(compact('sendlog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sendlog = $this->Sendlogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $sendlog = $this->Sendlogs->patchEntity($sendlog, $this->request->getData());
            if ($this->Sendlogs->save($sendlog)) {
                $this->Flash->success(__('The sendlog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sendlog could not be saved. Please, try again.'));
        }
        $uploadlogs = $this->Sendlogs->Uploadlogs->find('list', ['limit' => 200])->all();
        $this->set(compact('sendlog', 'uploadlogs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sendlog id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sendlog = $this->Sendlogs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sendlog = $this->Sendlogs->patchEntity($sendlog, $this->request->getData());
            if ($this->Sendlogs->save($sendlog)) {
                $this->Flash->success(__('The sendlog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sendlog could not be saved. Please, try again.'));
        }
        $uploadlogs = $this->Sendlogs->Uploadlogs->find('list', ['limit' => 200])->all();
        $this->set(compact('sendlog', 'uploadlogs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sendlog id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sendlog = $this->Sendlogs->get($id);
        if ($this->Sendlogs->delete($sendlog)) {
            $this->Flash->success(__('The sendlog has been deleted.'));
        } else {
            $this->Flash->error(__('The sendlog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
