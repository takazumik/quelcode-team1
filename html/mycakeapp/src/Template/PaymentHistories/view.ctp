<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentHistory $paymentHistory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Payment History'), ['action' => 'edit', $paymentHistory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment History'), ['action' => 'delete', $paymentHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentHistory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payment Histories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment History'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="paymentHistories view large-9 medium-8 columns content">
    <h3><?= h($paymentHistory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Schedule') ?></th>
            <td><?= $paymentHistory->has('schedule') ? $this->Html->link($paymentHistory->schedule->id, ['controller' => 'Schedules', 'action' => 'view', $paymentHistory->schedule->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $paymentHistory->has('user') ? $this->Html->link($paymentHistory->user->id, ['controller' => 'Users', 'action' => 'view', $paymentHistory->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($paymentHistory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Settlement Price') ?></th>
            <td><?= $this->Number->format($paymentHistory->settlement_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Cancelled') ?></th>
            <td><?= $paymentHistory->is_cancelled ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
