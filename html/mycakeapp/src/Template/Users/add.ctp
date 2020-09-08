<?=
    $this->Form->create($user, [
        'type' => 'post',
        'url' => ['controller' => 'Users', 'action' => 'add'],
    ]);
echo $this->Form->control('email', ['type' => 'email', 'label' => 'メールアドレス']);
echo $this->Form->control('password', ['label' => 'パスワード']);
echo $this->Form->control('password', ['label' => 'パスワード（確認用）']);
echo $this->Form->submit('会員登録');
echo $this->Form->end();
?>

