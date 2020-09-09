<?=
    $this->Html->css('user.css'); ?>
<?=
    $this->Form->create($user, [
        'type' => 'post',
        'url' => ['controller' => 'Users', 'action' => 'add'],
    ]);
?>
<div class="title">会員登録</div>
<div class="wrapper">
    <div class="inner">
    </div>
    <?php
    echo $this->Form->control('email', ['type' => 'email', 'label' => 'メールアドレス', 'required' => 'false']);
    echo $this->Form->control('password', ['type' => 'password', 'label' => 'パスワード']);
    echo $this->Form->control('password', ['type' => 'password', 'label' => 'パスワード（確認用）']);
    echo $this->Form->submit('会員登録');
    echo $this->Form->end();
    ?>

</div>
