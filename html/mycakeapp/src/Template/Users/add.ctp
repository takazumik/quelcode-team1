<?=
    $this->Html->css('user.css'); ?>
<h1>会員登録</h1>

<div class="wrapper">
    <?=
        $this->Form->create($user, [
            'type' => 'post',
            'url' => ['controller' => 'Users', 'action' => 'add'],
            'novalidate' => true
        ]);
    ?>
    <?php
    echo $this->Form->control('email', ['type' => 'email', 'placeholder' => 'メールアドレス', 'required' => false, 'label' => false]);
    echo $this->Form->control('password', ['type' => 'password', 'placeholder' => 'パスワード', 'required' => false, 'label' => false]);
    echo $this->Form->control('password_check', ['type' => 'password', 'placeholder' => 'パスワード（確認用）', 'required' => false, 'label' => false]);
    echo $this->Form->submit('会員登録');
    echo $this->Form->end();
    ?>
</div>
