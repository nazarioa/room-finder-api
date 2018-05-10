<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Floor $floor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Floor'), ['action' => 'edit', $floor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Floor'), ['action' => 'delete', $floor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Floors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floors'), ['controller' => 'Floors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor'), ['controller' => 'Floors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="floors view large-9 medium-8 columns content">
    <h3><?= h($floor->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($floor->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Building') ?></th>
            <td><?= $floor->has('building') ? $this->Html->link($floor->building->name, ['controller' => 'Buildings', 'action' => 'view', $floor->building->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($floor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Floor Id') ?></th>
            <td><?= $this->Number->format($floor->floor_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Floors') ?></h4>
        <?php if (!empty($floor->floors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Building Id') ?></th>
                <th scope="col"><?= __('Floor Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($floor->floors as $floors): ?>
            <tr>
                <td><?= h($floors->id) ?></td>
                <td><?= h($floors->name) ?></td>
                <td><?= h($floors->building_id) ?></td>
                <td><?= h($floors->floor_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Floors', 'action' => 'view', $floors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Floors', 'action' => 'edit', $floors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Floors', 'action' => 'delete', $floors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Rooms') ?></h4>
        <?php if (!empty($floor->rooms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Has Whiteboard') ?></th>
                <th scope="col"><?= __('Has Projection') ?></th>
                <th scope="col"><?= __('Image Coordiantes') ?></th>
                <th scope="col"><?= __('Floor Id') ?></th>
                <th scope="col"><?= __('Calendar Api') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($floor->rooms as $rooms): ?>
            <tr>
                <td><?= h($rooms->id) ?></td>
                <td><?= h($rooms->name) ?></td>
                <td><?= h($rooms->code) ?></td>
                <td><?= h($rooms->description) ?></td>
                <td><?= h($rooms->has_whiteboard) ?></td>
                <td><?= h($rooms->has_projection) ?></td>
                <td><?= h($rooms->image_coordiantes) ?></td>
                <td><?= h($rooms->floor_id) ?></td>
                <td><?= h($rooms->calendar_api) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rooms', 'action' => 'view', $rooms->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rooms', 'action' => 'edit', $rooms->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rooms', 'action' => 'delete', $rooms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rooms->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
