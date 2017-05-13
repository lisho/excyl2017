<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Candidatura'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puestos'), ['controller' => 'Puestos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Puesto'), ['controller' => 'Puestos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Convocados'), ['controller' => 'Convocados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Convocado'), ['controller' => 'Convocados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="candidaturas index large-9 medium-8 columns content">
    <h3><?= __('Candidaturas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puesto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('convocado_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nota') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidaturas as $candidatura): ?>
            <tr>
                <td><?= $this->Number->format($candidatura->id) ?></td>
                <td><?= $candidatura->has('puesto') ? $this->Html->link($candidatura->puesto->id, ['controller' => 'Puestos', 'action' => 'view', $candidatura->puesto->id]) : '' ?></td>
                <td><?= $candidatura->has('convocado') ? $this->Html->link($candidatura->convocado->id, ['controller' => 'Convocados', 'action' => 'view', $candidatura->convocado->id]) : '' ?></td>
                <td><?= $this->Number->format($candidatura->nota) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $candidatura->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $candidatura->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $candidatura->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidatura->id)]) ?>
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
