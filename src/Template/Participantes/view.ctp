<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Participante'), ['action' => 'edit', $participante->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Participante'), ['action' => 'delete', $participante->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participante->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Participantes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participante'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Relations'), ['controller' => 'Relations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Relation'), ['controller' => 'Relations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Expedientes'), ['controller' => 'Expedientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expediente'), ['controller' => 'Expedientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="participantes view large-9 medium-8 columns content">
    <h3><?= h($participante->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($participante->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sexo') ?></th>
            <td><?= h($participante->sexo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($participante->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
            <td><?= h($participante->apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($participante->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($participante->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Foto') ?></th>
            <td><?= h($participante->foto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relation') ?></th>
            <td><?= $participante->has('relation') ? $this->Html->link($participante->relation->id, ['controller' => 'Relations', 'action' => 'view', $participante->relation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expediente') ?></th>
            <td><?= $participante->has('expediente') ? $this->Html->link($participante->expediente->id, ['controller' => 'Expedientes', 'action' => 'view', $participante->expediente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($participante->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nacimiento') ?></th>
            <td><?= h($participante->nacimiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($participante->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($participante->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desactivado') ?></th>
            <td><?= $participante->desactivado ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observaciones') ?></h4>
        <?= $this->Text->autoParagraph(h($participante->observaciones)); ?>
    </div>
</div>
