<?=
    $this->Html->css('user.css'); ?>
<h1>ログイン</h1>
<div class="wrapper_login">
    <?= $this->Form->create(null, ['novalidate' => true]) ?>
    <?= $this->Form->control('email', ['type' => 'email', 'placeholder' => 'メールアドレス', 'required' => false, 'label' => false]) ?>
    <!-- エラーがない場合にundefinedの警告を出さないための条件分岐 -->
    <?php if (isset($mail_error)) {
        // エラー文にclassを付与するためのhtmlヘルパー
        echo $this->Html->tag('div', 'メールアドレスが間違っているようです。', array('class' => 'error'));
    }; ?>
    <?= $this->Form->control('password', ['type' => 'password', 'placeholder' => 'パスワード', 'required' => false, 'label' => false]) ?>
    <?php if (isset($pass_error)) {
        echo $this->Html->tag('div', 'パスワードが間違っているようです。', array('class' => 'error'));
    }; ?>
    <?= $this->Form->submit('ログイン') ?>
    <?= $this->Form->end() ?>

    <div class="registration">
        <?= $this->Html->link(
            "会員登録",
            [
                "controller" => "Users",
                "action" => "add"
            ]
        ) ?>
    </div>
    <div class="password_reminder">
        <!-- パスワード再設定のコントローラー・アクション名が決まれば上にならって書き換えてください -->
        <?= $this->Html->link(
            "パスワードを忘れた方はコチラ",
            "#"
        ) ?>
    </div>
</div>
