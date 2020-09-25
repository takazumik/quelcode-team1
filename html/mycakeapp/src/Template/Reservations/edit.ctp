<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reservation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cinemas'), ['controller' => 'Cinemas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cinema'), ['controller' => 'Cinemas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Seats'), ['controller' => 'Seats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Seat'), ['controller' => 'Seats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservations form large-9 medium-8 columns content">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('Edit Reservation') ?></legend>
        <?php
            echo $this->Form->control('cinema_id', ['options' => $cinemas]);
            echo $this->Form->control('seat_id', ['options' => $seats]);
            echo $this->Form->control('birthday');
            echo $this->Form->control('sex');
            echo $this->Form->control('number_of_people');
            echo $this->Form->control('is_cancelled');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
