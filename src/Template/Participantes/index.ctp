<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Participante'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Relations'), ['controller' => 'Relations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Relation'), ['controller' => 'Relations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expedientes'), ['controller' => 'Expedientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expediente'), ['controller' => 'Expedientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="participantes index large-9 medium-8 columns content">
    <h3><?= __('Participantes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sexo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellidos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('foto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nacimiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expediente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('desactivado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($participantes as $participante): ?>
            <tr>
                <td><?= $this->Number->format($participante->id) ?></td>
                <td><?= h($participante->dni) ?></td>
                <td><?= h($participante->sexo) ?></td>
                <td><?= h($participante->nombre) ?></td>
                <td><?= h($participante->apellidos) ?></td>
                <td><?= h($participante->telefono) ?></td>
                <td><?= h($participante->email) ?></td>
                <td><?= h($participante->foto) ?></td>
                <td><?= $participante->has('relation') ? $this->Html->link($participante->relation->id, ['controller' => 'Relations', 'action' => 'view', $participante->relation->id]) : '' ?></td>
                <td><?= h($participante->nacimiento) ?></td>
                <td><?= $participante->has('expediente') ? $this->Html->link($participante->expediente->id, ['controller' => 'Expedientes', 'action' => 'view', $participante->expediente->id]) : '' ?></td>
                <td><?= h($participante->desactivado) ?></td>
                <td><?= h($participante->created) ?></td>
                <td><?= h($participante->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $participante->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $participante->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $participante->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participante->id)]) ?>
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
