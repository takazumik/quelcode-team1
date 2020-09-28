<?=
    $this->Html->css('user.css'); ?>
<h1>決済情報</h1>
<div class="wrapper">
    <?= $this->Form->create($creditCard, [
            'type' => 'post',
            'url' => ['controller' => 'CreditCards', 'action' => 'add'],
            'novalidate' => true
        ]) ?>

        <?php

            echo $this->Form->control('card_number', ['type' => 'password', 'placeholder' => 'クレジットカード番号', 'required' => false, 'label' => false]);
            echo $this->Form->control('card_holder', ['type' => 'password', 'placeholder' => 'クレジットカード名義', 'required' => false, 'label' => false]);
            echo $this->Form->control('expiration_date', ['type' => 'password', 'placeholder' => '有効期限', 'required' => false, 'label' => false]);
            echo $this->Form->control('security_code', ['type' => 'password', 'placeholder' => 'セキュリティーコード', 'required' => false, 'label' => false]);
            echo $this->Form->submit('会員登録');
            echo $this->Form->end();
        ?>
</div>

