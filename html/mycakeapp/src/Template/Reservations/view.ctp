<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cinemas'), ['controller' => 'Cinemas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cinema'), ['controller' => 'Cinemas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Seats'), ['controller' => 'Seats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Seat'), ['controller' => 'Seats', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reservations view large-9 medium-8 columns content">
    <h3><?= h($reservation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cinema') ?></th>
            <td><?= $reservation->has('cinema') ? $this->Html->link($reservation->cinema->title, ['controller' => 'Cinemas', 'action' => 'view', $reservation->cinema->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seat') ?></th>
            <td><?= $reservation->has('seat') ? $this->Html->link($reservation->seat->id, ['controller' => 'Seats', 'action' => 'view', $reservation->seat->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reservation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of People') ?></th>
            <td><?= $this->Number->format($reservation->number_of_people) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday') ?></th>
            <td><?= h($reservation->birthday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sex') ?></th>
            <td><?= $reservation->sex ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Cancelled') ?></th>
            <td><?= $reservation->is_cancelled ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
