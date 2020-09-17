<?php

namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher; //added
use Cake\Event\Event; //added

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Token\Util\Token;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * registration method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        $this->set(compact('user'));
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->setAction('mail', $user);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }
    //AWSにてメール送信行うため、仮の実装。
    public function mail($user)
    {
        $this->set(compact('user'));
    }
    //token認証のメソッド。プラグインを使用。
    public function verify($token)
    {
        $user_id = $this->request->getQuery();
        $user = $this->Users->get(Token::getId($token));
        if (!$user->tokenVerify($token)) {
            $this->Flash->error(__('URLが無効です。'));
        }
        // ユーザーステータスを本登録にする。
        $entity = $this->Users->get($user_id);
        $data = array(
            'is_registrated' => 1
        );
        $user = $this->Users->patchEntity($entity, $data);
        $this->Users->save($user);
    }

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
        // ログインしているユーザー情報をauthuserに設定
        $this->set('authuser', $this->Auth->user());
    }
    // ログイン処理
    function login()
    {
        // POST時の処理
        if ($this->request->isPost()) {
            $user = $this->Auth->identify();
            // Authのidentifyをユーザーに設定
            if (!empty($user)) {
                $this->Auth->setUser($user);
                // return $this->redirect($this->Auth->redirectUrl());
                return $this->redirect(['controller' => 'Auction', 'action' => 'index']);
            }
            $this->Flash->error('ユーザー名かパスワードが間違っています。');
        }
    }
    // ログアウト処理
    public function logout()
    {
        // セッションを破棄
        $this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }

    // 認証を使わないページの設定
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'add']);
    }
}
