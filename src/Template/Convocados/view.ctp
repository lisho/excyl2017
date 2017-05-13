<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Convocado'), ['action' => 'edit', $convocado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Convocado'), ['action' => 'delete', $convocado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $convocado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Convocados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Convocado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nominas'), ['controller' => 'Nominas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nomina'), ['controller' => 'Nominas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Expedientes'), ['controller' => 'Expedientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expediente'), ['controller' => 'Expedientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Candidaturas'), ['controller' => 'Candidaturas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidatura'), ['controller' => 'Candidaturas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Valoracions'), ['controller' => 'Valoracions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Valoracion'), ['controller' => 'Valoracions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="convocados view large-9 medium-8 columns content">
    <h3><?= h($convocado->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($convocado->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($convocado->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
            <td><?= h($convocado->apellidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nomina') ?></th>
            <td><?= $convocado->has('nomina') ? $this->Html->link($convocado->nomina->id, ['controller' => 'Nominas', 'action' => 'view', $convocado->nomina->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expediente') ?></th>
            <td><?= $convocado->has('expediente') ? $this->Html->link($convocado->expediente->id, ['controller' => 'Expedientes', 'action' => 'view', $convocado->expediente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($convocado->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Candidaturas') ?></h4>
        <?php if (!empty($convocado->candidaturas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Puesto Id') ?></th>
                <th scope="col"><?= __('Convocado Id') ?></th>
                <th scope="col"><?= __('Nota') ?></th>
                <th scope="col"><?= __('Observaciones') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($convocado->candidaturas as $candidaturas): ?>
            <tr>
                <td><?= h($candidaturas->id) ?></td>
                <td><?= h($candidaturas->puesto_id) ?></td>
                <td><?= h($candidaturas->convocado_id) ?></td>
                <td><?= h($candidaturas->nota) ?></td>
                <td><?= h($candidaturas->observaciones) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Candidaturas', 'action' => 'view', $candidaturas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Candidaturas', 'action' => 'edit', $candidaturas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Candidaturas', 'action' => 'delete', $candidaturas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidaturas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Valoracions') ?></h4>
        <?php if (!empty($convocado->valoracions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Convocado Id') ?></th>
                <th scope="col"><?= __('Puede') ?></th>
                <th scope="col"><?= __('Sabe') ?></th>
                <th scope="col"><?= __('Quere') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($convocado->valoracions as $valoracions): ?>
            <tr>
                <td><?= h($valoracions->id) ?></td>
                <td><?= h($valoracions->convocado_id) ?></td>
                <td><?= h($valoracions->puede) ?></td>
                <td><?= h($valoracions->sabe) ?></td>
                <td><?= h($valoracions->quere) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Valoracions', 'action' => 'view', $valoracions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Valoracions', 'action' => 'edit', $valoracions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Valoracions', 'action' => 'delete', $valoracions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valoracions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
