<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Candidatura'), ['action' => 'edit', $candidatura->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Candidatura'), ['action' => 'delete', $candidatura->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidatura->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Candidaturas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidatura'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Puestos'), ['controller' => 'Puestos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Puesto'), ['controller' => 'Puestos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Convocados'), ['controller' => 'Convocados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Convocado'), ['controller' => 'Convocados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="candidaturas view large-9 medium-8 columns content">
    <h3><?= h($candidatura->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Puesto') ?></th>
            <td><?= $candidatura->has('puesto') ? $this->Html->link($candidatura->puesto->id, ['controller' => 'Puestos', 'action' => 'view', $candidatura->puesto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Convocado') ?></th>
            <td><?= $candidatura->has('convocado') ? $this->Html->link($candidatura->convocado->id, ['controller' => 'Convocados', 'action' => 'view', $candidatura->convocado->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($candidatura->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nota') ?></th>
            <td><?= $this->Number->format($candidatura->nota) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observaciones') ?></h4>
        <?= $this->Text->autoParagraph(h($candidatura->observaciones)); ?>
    </div>
</div>
