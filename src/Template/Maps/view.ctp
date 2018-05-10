<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Map $map
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Map'), ['action' => 'edit', $map->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Map'), ['action' => 'delete', $map->id], ['confirm' => __('Are you sure you want to delete # {0}?', $map->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Maps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Map'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="maps view large-9 medium-8 columns content">
    <h3><?= h($map->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image Url') ?></th>
            <td><?= h($map->image_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($map->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Buildings') ?></h4>
        <?php if (!empty($map->buildings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('Zip') ?></th>
                <th scope="col"><?= __('Image Coordiantes') ?></th>
                <th scope="col"><?= __('Map Id') ?></th>
                <th scope="col"><?= __('Latitude') ?></th>
                <th scope="col"><?= __('Longitude') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($map->buildings as $buildings): ?>
            <tr>
                <td><?= h($buildings->id) ?></td>
                <td><?= h($buildings->name) ?></td>
                <td><?= h($buildings->address) ?></td>
                <td><?= h($buildings->state) ?></td>
                <td><?= h($buildings->zip) ?></td>
                <td><?= h($buildings->image_coordiantes) ?></td>
                <td><?= h($buildings->map_id) ?></td>
                <td><?= h($buildings->latitude) ?></td>
                <td><?= h($buildings->longitude) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Buildings', 'action' => 'view', $buildings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Buildings', 'action' => 'edit', $buildings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Buildings', 'action' => 'delete', $buildings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buildings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
