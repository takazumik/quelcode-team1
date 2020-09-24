<?php

namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher; // added
use Cake\Event\Event; // added

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
                $this->setAction('mail', $user);
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

    public function login()
    {
        // Usersテーブルにあるデータと照合をかけるのでUsersテーブルを呼び出している
        $this->loadModel('Users');
        if ($this->request->is('post')) {
            // postされたemailと同じアドレスを持つユーザーを検索している
            $user_data = $this->Users->find()->where(['email' => $_POST['email'], 'is_registrated' => true])->first();
            // メールアドレスの正規表現
            $reg_str = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";
            $user = $this->Auth->identify();
            if ($user && $user_data['is_registrated'] === true) {
                $this->Auth->setUser($user);
                // ログイン後にリダイレクトするURLが決まり次第()の中を書き換えて下さい
                return $this->redirect($this->Auth->redirectUrl('/users'));
            } elseif ($_POST['email'] === '') {
                $this->set('mail_vacant', '空白になっています。');
            } elseif (preg_match($reg_str, $_POST['email']) === false) {
                $this->set('mail_format', 'メールアドレスが間違っているようです。');
            } elseif ($_POST['email'] !== $user_data['email']) {
                // エラー文はヘッダー、フッター完成後に位置調整必要
                $this->set('mail_error', 'メールアドレスが間違っているようです。');
            } elseif ($_POST['password'] === '') {
                $this->set('password_vacant', '空白になっています。');
            } else {
                $this->set('pass_error', 'パスワードが間違っているようです。');
            }
        }
    }

    // ログアウト処理
    public function logout()
    {
        $this->Flash->success('ログアウトしました。');
        return $this->redirect($this->Auth->logout());
    }
    // 認証なしにアクセス可能なアクション
    public function initialize()
    {
        $this->loadModel('Users');
        parent::initialize();
        $this->Auth->allow(['logout', 'add', 'verify', 'login']);
    }

    // ログイン成功を見ることができるよう、仮のindexアクション
    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
}
