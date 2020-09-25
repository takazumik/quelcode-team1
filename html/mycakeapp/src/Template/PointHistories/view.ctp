<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PointHistory $pointHistory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Point History'), ['action' => 'edit', $pointHistory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Point History'), ['action' => 'delete', $pointHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pointHistory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Point Histories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Point History'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pointHistories view large-9 medium-8 columns content">
    <h3><?= h($pointHistory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Point Histories') ?></th>
            <td><?= h($pointHistory->Point_histories) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pointHistory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment History') ?></th>
            <td><?= $this->Number->format($pointHistory->payment_history) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Point') ?></th>
            <td><?= $this->Number->format($pointHistory->point) ?></td>
        </tr>
    </table>
</div>
