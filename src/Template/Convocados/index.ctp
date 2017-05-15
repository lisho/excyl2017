<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Convocado'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nominas'), ['controller' => 'Nominas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nomina'), ['controller' => 'Nominas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expedientes'), ['controller' => 'Expedientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expediente'), ['controller' => 'Expedientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Candidaturas'), ['controller' => 'Candidaturas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Candidatura'), ['controller' => 'Candidaturas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Valoracions'), ['controller' => 'Valoracions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Valoracion'), ['controller' => 'Valoracions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="convocados index large-9 medium-8 columns content">
    <h3><?= __('Convocados') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                
                <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellidos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('<i class="fa fa-money"></i>') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expediente_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($convocados as $convocado): ?>
            <tr>
                
                <td><?= h($convocado->dni) ?></td>
                <td><?= h($convocado->nombre) ?></td>
                <td><?= h($convocado->apellidos) ?></td>
                <td><?= h($convocado->telefono) ?></td>
                <td><?= $convocado->has('nomina') ? $this->Html->link($convocado->nomina->id, ['controller' => 'Nominas', 'action' => 'view', $convocado->nomina->id]) : '' ?></td>
                <td><?= $convocado->has('expediente') ? $this->Html->link($convocado->expediente->id, ['controller' => 'Expedientes', 'action' => 'view', $convocado->expediente->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $convocado->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $convocado->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $convocado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $convocado->id)]) ?>
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
