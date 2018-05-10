<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRoom[]|\Cake\Collection\CollectionInterface $userRooms
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Room'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userRooms index large-9 medium-8 columns content">
    <h3><?= __('User Rooms') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('room_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userRooms as $userRoom): ?>
            <tr>
                <td><?= $this->Number->format($userRoom->id) ?></td>
                <td><?= $userRoom->has('user') ? $this->Html->link($userRoom->user->id, ['controller' => 'Users', 'action' => 'view', $userRoom->user->id]) : '' ?></td>
                <td><?= $userRoom->has('room') ? $this->Html->link($userRoom->room->name, ['controller' => 'Rooms', 'action' => 'view', $userRoom->room->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userRoom->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userRoom->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userRoom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRoom->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
