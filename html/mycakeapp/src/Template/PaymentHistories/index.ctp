<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PaymentHistory[]|\Cake\Collection\CollectionInterface $paymentHistories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Payment History'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paymentHistories index large-9 medium-8 columns content">
    <h3><?= __('Payment Histories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('schedule_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_cancelled') ?></th>
                <th scope="col"><?= $this->Paginator->sort('settlement_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paymentHistories as $paymentHistory): ?>
            <tr>
                <td><?= $this->Number->format($paymentHistory->id) ?></td>
                <td><?= $paymentHistory->has('schedule') ? $this->Html->link($paymentHistory->schedule->id, ['controller' => 'Schedules', 'action' => 'view', $paymentHistory->schedule->id]) : '' ?></td>
                <td><?= h($paymentHistory->is_cancelled) ?></td>
                <td><?= $this->Number->format($paymentHistory->settlement_price) ?></td>
                <td><?= $paymentHistory->has('user') ? $this->Html->link($paymentHistory->user->id, ['controller' => 'Users', 'action' => 'view', $paymentHistory->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $paymentHistory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paymentHistory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paymentHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentHistory->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
