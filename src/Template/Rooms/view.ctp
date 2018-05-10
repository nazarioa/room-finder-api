<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floors'), ['controller' => 'Floors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor'), ['controller' => 'Floors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Rooms'), ['controller' => 'UserRooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Room'), ['controller' => 'UserRooms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rooms view large-9 medium-8 columns content">
    <h3><?= h($room->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($room->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($room->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Coordiantes') ?></th>
            <td><?= h($room->image_coordiantes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Floor') ?></th>
            <td><?= $room->has('floor') ? $this->Html->link($room->floor->name, ['controller' => 'Floors', 'action' => 'view', $room->floor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Calendar Api') ?></th>
            <td><?= h($room->calendar_api) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($room->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Has Whiteboard') ?></th>
            <td><?= $room->has_whiteboard ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Has Projection') ?></th>
            <td><?= $room->has_projection ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($room->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Rooms') ?></h4>
        <?php if (!empty($room->user_rooms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Room Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($room->user_rooms as $userRooms): ?>
            <tr>
                <td><?= h($userRooms->id) ?></td>
                <td><?= h($userRooms->user_id) ?></td>
                <td><?= h($userRooms->room_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserRooms', 'action' => 'view', $userRooms->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserRooms', 'action' => 'edit', $userRooms->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserRooms', 'action' => 'delete', $userRooms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRooms->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
