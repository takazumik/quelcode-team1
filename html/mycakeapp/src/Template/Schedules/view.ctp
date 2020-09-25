<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cinemas'), ['controller' => 'Cinemas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cinema'), ['controller' => 'Cinemas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payment Histories'), ['controller' => 'PaymentHistories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment History'), ['controller' => 'PaymentHistories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schedules view large-9 medium-8 columns content">
    <h3><?= h($schedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cinema') ?></th>
            <td><?= $schedule->has('cinema') ? $this->Html->link($schedule->cinema->title, ['controller' => 'Cinemas', 'action' => 'view', $schedule->cinema->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($schedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($schedule->start_time) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Payment Histories') ?></h4>
        <?php if (!empty($schedule->payment_histories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Schedule Id') ?></th>
                <th scope="col"><?= __('Is Cancelled') ?></th>
                <th scope="col"><?= __('Settlement Price') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($schedule->payment_histories as $paymentHistories): ?>
            <tr>
                <td><?= h($paymentHistories->id) ?></td>
                <td><?= h($paymentHistories->schedule_id) ?></td>
                <td><?= h($paymentHistories->is_cancelled) ?></td>
                <td><?= h($paymentHistories->settlement_price) ?></td>
                <td><?= h($paymentHistories->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PaymentHistories', 'action' => 'view', $paymentHistories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PaymentHistories', 'action' => 'edit', $paymentHistories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PaymentHistories', 'action' => 'delete', $paymentHistories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentHistories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
