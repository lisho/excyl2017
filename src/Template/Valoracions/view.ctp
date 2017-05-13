<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Valoracion'), ['action' => 'edit', $valoracion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Valoracion'), ['action' => 'delete', $valoracion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valoracion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Valoracions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Valoracion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Convocados'), ['controller' => 'Convocados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Convocado'), ['controller' => 'Convocados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="valoracions view large-9 medium-8 columns content">
    <h3><?= h($valoracion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Convocado') ?></th>
            <td><?= $valoracion->has('convocado') ? $this->Html->link($valoracion->convocado->id, ['controller' => 'Convocados', 'action' => 'view', $valoracion->convocado->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Puede') ?></th>
            <td><?= h($valoracion->puede) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sabe') ?></th>
            <td><?= h($valoracion->sabe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quere') ?></th>
            <td><?= h($valoracion->quere) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($valoracion->id) ?></td>
        </tr>
    </table>
</div>
