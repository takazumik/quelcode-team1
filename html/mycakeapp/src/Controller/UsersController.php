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


    public function login01()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                // ログイン後にリダイレクトするURLが決まり次第()の中を書き換えて下さい
                return $this->redirect($this->Auth->redirectUrl('/users'));
            }
            $this->Flash->error('ユーザー名またはパスワードが不正です。');
        }
    }
    public function login02()
    {
        $this->loadModel('Users');

        if ($this->request->is('post')) {

            // $email = $this->request->getData('email');
            // $password = $this->request->getData('password');

            // $user = $this->Users->findByEmailAndPassword($email, $password)->first();



            $user =  $this->Users->get(1);
            // if ($user && (new DefaultPasswordHasher())->check($password, $user->password)) {
            //     $this->Auth->setUser($user);
            //     // return $this->redirect('/users');
            // }
            //  elseif ($_POST['email'] !== $email) {
            //     $this->Flash->error('メールアドレスが不正です。');
            // } else {
            //     $this->Flash->error('ユーザー名とパスワードが不正です。');
            // }
            // $this->set(compact('user'));
            print_r($user);
            echo 'www';
            var_dump($_POST['email']);
        }
    }

    public function login()
    {
        $this->loadModel('Users');
        if ($this->request->is('post')) {

            $user_data = $this->Users->find()->where(['email' => $_POST['email']])->first();

            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                // ログイン後にリダイレクトするURLが決まり次第()の中を書き換えて下さい
                return $this->redirect($this->Auth->redirectUrl('/users'));
            } elseif ($_POST['email'] !== $user_data['email']) {
                $this->Html->para(
                    'p_style',
                    'メールアドレスが間違っているようです。',
                    ['align' => 'center', 'font-size' => '24px']
                );
            } else {
                $this->Html->para(
                    'p_style',
                    'パスワードが間違っているようです。',
                    ['align' => 'center', 'font-size' => '24px']
                );
            }
        }
    }


    public function _validate($id = null)
    {
        $email = $this->Users->get($id);
        $password = $this->Users->get($id);
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
        $this->Auth->allow(['logout', 'add']);
    }

    public function index($id = null)
    {
        $user = $this->Users;
        $this->set(compact('user'));
    }
}
