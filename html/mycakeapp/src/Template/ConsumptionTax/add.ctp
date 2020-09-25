<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConsumptionTax $consumptionTax
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Consumption Tax'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="consumptionTax form large-9 medium-8 columns content">
    <?= $this->Form->create($consumptionTax) ?>
    <fieldset>
        <legend><?= __('Add Consumption Tax') ?></legend>
        <?php
            echo $this->Form->control('consumption_tax');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
