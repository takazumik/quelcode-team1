<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PointHistory $pointHistory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Point Histories'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pointHistories form large-9 medium-8 columns content">
    <?= $this->Form->create($pointHistory) ?>
    <fieldset>
        <legend><?= __('Add Point History') ?></legend>
        <?php
            echo $this->Form->control('Point_histories');
            echo $this->Form->control('payment_history');
            echo $this->Form->control('point');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
