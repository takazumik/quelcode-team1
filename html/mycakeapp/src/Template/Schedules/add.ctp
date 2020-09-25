<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cinemas'), ['controller' => 'Cinemas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cinema'), ['controller' => 'Cinemas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payment Histories'), ['controller' => 'PaymentHistories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment History'), ['controller' => 'PaymentHistories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schedules form large-9 medium-8 columns content">
    <?= $this->Form->create($schedule) ?>
    <fieldset>
        <legend><?= __('Add Schedule') ?></legend>
        <?php
            echo $this->Form->control('cinema_id', ['options' => $cinemas]);
            echo $this->Form->control('start_time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
