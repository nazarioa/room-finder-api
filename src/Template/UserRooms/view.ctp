<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRoom $userRoom
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Room'), ['action' => 'edit', $userRoom->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Room'), ['action' => 'delete', $userRoom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRoom->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userRooms view large-9 medium-8 columns content">
    <h3><?= h($userRoom->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userRoom->has('user') ? $this->Html->link($userRoom->user->id, ['controller' => 'Users', 'action' => 'view', $userRoom->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Room') ?></th>
            <td><?= $userRoom->has('room') ? $this->Html->link($userRoom->room->name, ['controller' => 'Rooms', 'action' => 'view', $userRoom->room->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userRoom->id) ?></td>
        </tr>
    </table>
</div>
