<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Summaries Controller
 *
 * @property \App\Model\Table\SummariesTable $Summaries
 * @method \App\Model\Entity\Summary[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SummariesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'order' => ['uploaded' => 'desc'],
            'limit' => 50,
        ];
        $summaries = $this->paginate($this->Summaries);

        $this->set(compact('summaries'));
    }

    public function index2()
    {
        if (is_null($this->request->getQuery('name1')) &&
            is_null($this->request->getQuery('name2')) &&
            is_null($this->request->getQuery('start')) &&
            is_null($this->request->getQuery('end')) &&
            is_null($this->request->getQuery('keyword'))) {
            $name1 = '1';
            $name2 = '';
            $start = date('Y/m/d', strtotime("today 1 day -1 month"));
            $end = date("Y/m/d");
            $keyword = '';
        } else {
            $name1 = $this->request->getQuery('name1');
            $name2 = $this->request->getQuery('name2');
            $start = $this->request->getQuery('start');
            $end = $this->request->getQuery('end');
            $keyword = $this->request->getQuery('keyword');
        }

        $this->request = $this->request->withData('name1', $name1);
        $this->request = $this->request->withData('name2', $name2);
        $this->request = $this->request->withData('start', $start);
        $this->request = $this->request->withData('end', $end);
        $this->request = $this->request->withData('keyword', $keyword);

		/**
        $param = $this->request->getData();

        if ($this->request->is('get')) {
            $name1 = '1';
            $this->request = $this->request->withData('name1', $name1);
            $name2 = '';
            //$start = date("Y/m/d");
            $start = date('Y/m/d', strtotime("today 1 day -1 month"));
            $this->request = $this->request->withData('start', $start);
            $end = date("Y/m/d");
            $this->request = $this->request->withData('end', $end);
            $keyword = '';
        } else {
            $name1 = $param['name1'];
            $name2 = $param['name2'];
            $start = $param['start'];
            $end = $param['end'];
            $keyword = $param['keyword'];
        }
        **/
		
        $condition = [];

        if ($name1 == '1' && $name2 == '1'){
            //
        } else if ($name1 == '1'){
            $condition['name ='] = 'ONE CONTACT';
        } else if ($name2 == '1'){
            $condition['name <>'] = 'ONE CONTACT';
        } else {
            $condition['1 = '] = 2;
        }
        $condition['uploaded >='] = $start;
        $condition['uploaded <='] = $end;
        if (!empty($keyword)){
            $condition['name like'] = "%{$keyword}%";
        }

        $this->paginate = [
            'order' => ['id' => 'desc'],
            'limit' => 50,
        ];
        $summaries = $this->paginate($this->Summaries->find()
            ->where($condition));

        $this->set(compact('summaries'));
    }

    /**
     * View method
     *
     * @param string|null $id Summary id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $summary = $this->Summaries->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('summary'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $summary = $this->Summaries->newEmptyEntity();
        if ($this->request->is('post')) {
            $summary = $this->Summaries->patchEntity($summary, $this->request->getData());
            if ($this->Summaries->save($summary)) {
                $this->Flash->success(__('The summary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The summary could not be saved. Please, try again.'));
        }
        $this->set(compact('summary'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Summary id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $summary = $this->Summaries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $summary = $this->Summaries->patchEntity($summary, $this->request->getData());
            if ($this->Summaries->save($summary)) {
                $this->Flash->success(__('The summary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The summary could not be saved. Please, try again.'));
        }
        $this->set(compact('summary'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Summary id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $summary = $this->Summaries->get($id);
        if ($this->Summaries->delete($summary)) {
            $this->Flash->success(__('The summary has been deleted.'));
        } else {
            $this->Flash->error(__('The summary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
