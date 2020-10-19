<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Feelings Controller
 *
 * @property \App\Model\Table\FeelingsTable $Feelings
 * @method \App\Model\Entity\Feeling[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FeelingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Statuses'],
        ];
        $feelings = $this->paginate($this->Feelings);

        $this->set(compact('feelings'));
    }

    /**
     * View method
     *
     * @param string|null $id Feeling id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $feeling = $this->Feelings->get($id, [
            'contain' => ['Users', 'Statuses'],
        ]);

        $this->set(compact('feeling'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $feeling = $this->Feelings->newEmptyEntity();
        if ($this->request->is('post')) {
            $feeling = $this->Feelings->patchEntity($feeling, $this->request->getData());
            if ($this->Feelings->save($feeling)) {
                $this->Flash->success(__('The feeling has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The feeling could not be saved. Please, try again.'));
        }
        $users = $this->Feelings->Users->find('list', ['limit' => 200]);
        $statuses = $this->Feelings->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('feeling', 'users', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Feeling id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $feeling = $this->Feelings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $feeling = $this->Feelings->patchEntity($feeling, $this->request->getData());
            if ($this->Feelings->save($feeling)) {
                $this->Flash->success(__('The feeling has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The feeling could not be saved. Please, try again.'));
        }
        $users = $this->Feelings->Users->find('list', ['limit' => 200]);
        $statuses = $this->Feelings->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('feeling', 'users', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Feeling id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $feeling = $this->Feelings->get($id);
        if ($this->Feelings->delete($feeling)) {
            $this->Flash->success(__('The feeling has been deleted.'));
        } else {
            $this->Flash->error(__('The feeling could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
