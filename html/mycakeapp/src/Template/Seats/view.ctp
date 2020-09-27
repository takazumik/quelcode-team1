<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Seat $seat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Seat'), ['action' => 'edit', $seat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Seat'), ['action' => 'delete', $seat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Seats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Seat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="seats view large-9 medium-8 columns content">
    <h3><?= h($seat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($seat->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seat Number') ?></th>
            <td><?= $this->Number->format($seat->seat_number) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Reservations') ?></h4>
        <?php if (!empty($seat->reservations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cinema Id') ?></th>
                <th scope="col"><?= __('Seat Id') ?></th>
                <th scope="col"><?= __('Birthday') ?></th>
                <th scope="col"><?= __('Sex') ?></th>
                <th scope="col"><?= __('Number Of People') ?></th>
                <th scope="col"><?= __('Is Cancelled') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($seat->reservations as $reservations): ?>
            <tr>
                <td><?= h($reservations->id) ?></td>
                <td><?= h($reservations->cinema_id) ?></td>
                <td><?= h($reservations->seat_id) ?></td>
                <td><?= h($reservations->birthday) ?></td>
                <td><?= h($reservations->sex) ?></td>
                <td><?= h($reservations->number_of_people) ?></td>
                <td><?= h($reservations->is_cancelled) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reservations', 'action' => 'view', $reservations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reservations', 'action' => 'edit', $reservations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
