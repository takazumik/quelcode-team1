<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConsumptionTax $consumptionTax
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Consumption Tax'), ['action' => 'edit', $consumptionTax->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Consumption Tax'), ['action' => 'delete', $consumptionTax->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consumptionTax->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Consumption Tax'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Consumption Tax'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="consumptionTax view large-9 medium-8 columns content">
    <h3><?= h($consumptionTax->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($consumptionTax->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consumption Tax') ?></th>
            <td><?= $this->Number->format($consumptionTax->consumption_tax) ?></td>
        </tr>
    </table>
</div>
