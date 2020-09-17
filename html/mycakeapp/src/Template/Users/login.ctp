<?=
    $this->Html->css('user.css'); ?>
<h1>ログイン</h1>
<div class="wrapper">
    <?= $this->Form->create() ?>
    <?= $this->Form->control('email', ['type' => 'email', 'placeholder' => 'メールアドレス', 'required' => false, 'label' => false]) ?>
    <?= $this->Form->control('password', ['type' => 'password', 'placeholder' => 'パスワード', 'required' => false, 'label' => false]) ?>
    <?= $this->Form->submit('ログイン') ?>
    <?= $this->Form->end() ?>
    <div class="centerize">
        <?= $this->Html->link(
            "会員登録",
            [
                "controller" => "Users",
                "action" => "add"
            ]
        ) ?>
    </div>
    <div class="centerize">
        <!-- パスワード再設定のコントローラー・アクション名が決まれば上にならって書き換えてください -->
        <?= $this->Html->link(
            "パスワードを忘れた方はコチラ",
            "#"
        ) ?>
    </div>
</div>
