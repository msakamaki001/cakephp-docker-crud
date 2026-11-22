<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Calcs Controller
 *
 * @property \App\Model\Table\CalcsTable $Calcs
 */
class CalcsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Calcs->find()
            ->contain(['Points']);
        $calcs = $this->paginate($query);

        $this->set(compact('calcs'));
    }

    /**
     * View method
     *
     * @param string|null $id Calc id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $calc = $this->Calcs->get($id, contain: ['Points']);
        $this->set(compact('calc'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $calc = $this->Calcs->newEmptyEntity();
        if ($this->request->is('post')) {
            $calc = $this->Calcs->patchEntity($calc, $this->request->getData());
            if ($this->Calcs->save($calc)) {
                $this->Flash->success(__('The calc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calc could not be saved. Please, try again.'));
        }
        $points = $this->Calcs->Points->find('list', limit: 200)->all();
        $this->set(compact('calc', 'points'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Calc id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $calc = $this->Calcs->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $calc = $this->Calcs->patchEntity($calc, $this->request->getData());
            if ($this->Calcs->save($calc)) {
                $this->Flash->success(__('The calc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calc could not be saved. Please, try again.'));
        }
        $points = $this->Calcs->Points->find('list', limit: 200)->all();
        $this->set(compact('calc', 'points'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Calc id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $calc = $this->Calcs->get($id);
        if ($this->Calcs->delete($calc)) {
            $this->Flash->success(__('The calc has been deleted.'));
        } else {
            $this->Flash->error(__('The calc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
