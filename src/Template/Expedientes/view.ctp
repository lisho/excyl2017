<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Expediente'), ['action' => 'edit', $expediente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Expediente'), ['action' => 'delete', $expediente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expediente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Expedientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expediente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Convocados'), ['controller' => 'Convocados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Convocado'), ['controller' => 'Convocados', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Participantes'), ['controller' => 'Participantes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participante'), ['controller' => 'Participantes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="expedientes view large-9 medium-8 columns content">
    <h3><?= h($expediente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Numedis') ?></th>
            <td><?= h($expediente->numedis) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numhs') ?></th>
            <td><?= h($expediente->numhs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ceas') ?></th>
            <td><?= h($expediente->ceas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Domicilio') ?></th>
            <td><?= h($expediente->domicilio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($expediente->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($expediente->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($expediente->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observaciones') ?></h4>
        <?= $this->Text->autoParagraph(h($expediente->observaciones)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Convocados') ?></h4>
        <?php if (!empty($expediente->convocados)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Dni') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Apellidos') ?></th>
                <th scope="col"><?= __('Nomina Id') ?></th>
                <th scope="col"><?= __('Expediente Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($expediente->convocados as $convocados): ?>
            <tr>
                <td><?= h($convocados->id) ?></td>
                <td><?= h($convocados->dni) ?></td>
                <td><?= h($convocados->nombre) ?></td>
                <td><?= h($convocados->apellidos) ?></td>
                <td><?= h($convocados->nomina_id) ?></td>
                <td><?= h($convocados->expediente_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Convocados', 'action' => 'view', $convocados->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Convocados', 'action' => 'edit', $convocados->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Convocados', 'action' => 'delete', $convocados->id], ['confirm' => __('Are you sure you want to delete # {0}?', $convocados->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Participantes') ?></h4>
        <?php if (!empty($expediente->participantes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Dni') ?></th>
                <th scope="col"><?= __('Sexo') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Apellidos') ?></th>
                <th scope="col"><?= __('Telefono') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Foto') ?></th>
                <th scope="col"><?= __('Observaciones') ?></th>
                <th scope="col"><?= __('Relation Id') ?></th>
                <th scope="col"><?= __('Nacimiento') ?></th>
                <th scope="col"><?= __('Expediente Id') ?></th>
                <th scope="col"><?= __('Desactivado') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($expediente->participantes as $participantes): ?>
            <tr>
                <td><?= h($participantes->id) ?></td>
                <td><?= h($participantes->dni) ?></td>
                <td><?= h($participantes->sexo) ?></td>
                <td><?= h($participantes->nombre) ?></td>
                <td><?= h($participantes->apellidos) ?></td>
                <td><?= h($participantes->telefono) ?></td>
                <td><?= h($participantes->email) ?></td>
                <td><?= h($participantes->foto) ?></td>
                <td><?= h($participantes->observaciones) ?></td>
                <td><?= h($participantes->relation_id) ?></td>
                <td><?= h($participantes->nacimiento) ?></td>
                <td><?= h($participantes->expediente_id) ?></td>
                <td><?= h($participantes->desactivado) ?></td>
                <td><?= h($participantes->created) ?></td>
                <td><?= h($participantes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Participantes', 'action' => 'view', $participantes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Participantes', 'action' => 'edit', $participantes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Participantes', 'action' => 'delete', $participantes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participantes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
