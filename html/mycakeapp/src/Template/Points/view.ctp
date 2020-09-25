<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Point $point
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Point'), ['action' => 'edit', $point->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Point'), ['action' => 'delete', $point->id], ['confirm' => __('Are you sure you want to delete # {0}?', $point->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Points'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Point'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="points view large-9 medium-8 columns content">
    <h3><?= h($point->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Point Name') ?></th>
            <td><?= h($point->point_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($point->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Point Percentage') ?></th>
            <td><?= $this->Number->format($point->point_percentage) ?></td>
        </tr>
    </table>
</div>
