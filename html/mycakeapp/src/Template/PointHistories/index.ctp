<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PointHistory[]|\Cake\Collection\CollectionInterface $pointHistories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Point History'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pointHistories index large-9 medium-8 columns content">
    <h3><?= __('Point Histories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Point_histories') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_history') ?></th>
                <th scope="col"><?= $this->Paginator->sort('point') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pointHistories as $pointHistory): ?>
            <tr>
                <td><?= $this->Number->format($pointHistory->id) ?></td>
                <td><?= h($pointHistory->Point_histories) ?></td>
                <td><?= $this->Number->format($pointHistory->payment_history) ?></td>
                <td><?= $this->Number->format($pointHistory->point) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pointHistory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pointHistory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pointHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pointHistory->id)]) ?>
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
