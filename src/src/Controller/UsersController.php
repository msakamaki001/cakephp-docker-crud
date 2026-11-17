<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /** login method */
    public function login() {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // ログイン成功
        if ($result && $result->isValid()) {
           // ログイン成功時のユーザーentityを取得
           $user = $this->Authentication->getIdentity()->getOriginalData(); 
           if ($user->role === 'admin') {
               $redirect = $this->request->getQuery('redirect', [
                   'controller' => 'Users',
                   'action' => 'index',
               ]);
           } else {
               $redirect = $this->request->getQuery('redirect', [
                   'controller' => 'Users',
                   'action' => 'view',
                   $user->id,
               ]);
           }
            return $this->redirect($redirect);
        }
        // POST, ログイン失敗
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('メールアドレスまたはパスワードが間違っています。'));
        }
    }

    /** logout method */
    public function logout() {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    /** add method */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('ユーザーが登録されました。'));
                return $this->redirect(['action' => 'index']);
            }
            debug($user->getErrors());
            $this->Flash->error(__('ユーザーの登録に失敗しました。'));
        }
        $this->set(compact('user'));
    }

    /** view method */
    public function view($id = null)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }
}
