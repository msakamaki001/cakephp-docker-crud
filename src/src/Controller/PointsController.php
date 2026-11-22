<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Points Controller
 *
 * @property \App\Model\Table\PointsTable $Points
 */
class PointsController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $user = $this->Authentication->getIdentity()->getOriginalData();
        // index（一覧）と view（詳細）以外の操作を、管理者以外に禁止する
        if (!$user->isAdmin() && !in_array($this->request->getParam('action'), ['index', 'view'])) {
            $this->Flash->error('点数マスタの登録・編集は管理者のみ可能です。');
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Points->find();
        $points = $this->paginate($query);

        $this->set(compact('points'));
    }

    /**
     * View method
     *
     * @param string|null $id Point id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $point = $this->Points->get($id, contain: ['Calcs']);
        $this->set(compact('point'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $point = $this->Points->newEmptyEntity();
        if ($this->request->is('post')) {
            $point = $this->Points->patchEntity($point, $this->request->getData());
            //ログイン中のユーザーIDを取得して、作成者として保存する
            $user = $this->Authentication->getIdentity()->getOriginalData();
            $point->created_by = $user->id;
            if ($this->Points->save($point)) {
                $this->Flash->success(__('診療点数を登録しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('診療点数の登録に失敗しました。もう一度お試しください。'));
        }
        $this->set(compact('point'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Point id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $point = $this->Points->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $point = $this->Points->patchEntity($point, $this->request->getData());
            if ($this->Points->save($point)) {
                $this->Flash->success(__('The point has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The point could not be saved. Please, try again.'));
        }
        $this->set(compact('point'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Point id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $point = $this->Points->get($id);
        if ($this->Points->delete($point)) {
            $this->Flash->success(__('The point has been deleted.'));
        } else {
            $this->Flash->error(__('The point could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
