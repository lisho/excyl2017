<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Equipo'), ['action' => 'edit', $equipo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Equipo'), ['action' => 'delete', $equipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Equipos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="equipos view large-9 medium-8 columns content">
    <h3><?= h($equipo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($equipo->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($equipo->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entidad') ?></th>
            <td><?= h($equipo->entidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aas') ?></th>
            <td><?= h($equipo->aas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($equipo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($equipo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($equipo->modified) ?></td>
        </tr>
    </table>
</div>
