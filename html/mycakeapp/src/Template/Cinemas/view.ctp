<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cinema $cinema
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cinema'), ['action' => 'edit', $cinema->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cinema'), ['action' => 'delete', $cinema->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cinema->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cinemas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cinema'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cinemas view large-9 medium-8 columns content">
    <h3><?= h($cinema->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($cinema->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thumbnail Path') ?></th>
            <td><?= h($cinema->thumbnail_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cinema->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Running Time') ?></th>
            <td><?= $this->Number->format($cinema->running_time) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Reservations') ?></h4>
        <?php if (!empty($cinema->reservations)): ?>
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
            <?php foreach ($cinema->reservations as $reservations): ?>
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
    <div class="related">
        <h4><?= __('Related Schedules') ?></h4>
        <?php if (!empty($cinema->schedules)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cinema Id') ?></th>
                <th scope="col"><?= __('Start Time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cinema->schedules as $schedules): ?>
            <tr>
                <td><?= h($schedules->id) ?></td>
                <td><?= h($schedules->cinema_id) ?></td>
                <td><?= h($schedules->start_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Schedules', 'action' => 'view', $schedules->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Schedules', 'action' => 'edit', $schedules->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Schedules', 'action' => 'delete', $schedules->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedules->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
