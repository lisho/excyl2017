<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nomina'), ['action' => 'edit', $nomina->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nomina'), ['action' => 'delete', $nomina->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nomina->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nominas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nomina'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Convocados'), ['controller' => 'Convocados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Convocado'), ['controller' => 'Convocados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nominas view large-9 medium-8 columns content">
    <h3><?= h($nomina->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('CCLL') ?></th>
            <td><?= h($nomina->CCLL) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CEAS') ?></th>
            <td><?= h($nomina->CEAS) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('HS') ?></th>
            <td><?= h($nomina->HS) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RGC') ?></th>
            <td><?= h($nomina->RGC) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CLASIFICACION') ?></th>
            <td><?= h($nomina->CLASIFICACION) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MIEMBROS') ?></th>
            <td><?= h($nomina->MIEMBROS) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($nomina->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombrecompleto') ?></th>
            <td><?= h($nomina->nombrecompleto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SEXO') ?></th>
            <td><?= h($nomina->SEXO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EDAD') ?></th>
            <td><?= h($nomina->EDAD) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NACIONALIDAD') ?></th>
            <td><?= h($nomina->NACIONALIDAD) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DOMICILIO') ?></th>
            <td><?= h($nomina->DOMICILIO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RESOLUCION') ?></th>
            <td><?= h($nomina->RESOLUCION) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relacion') ?></th>
            <td><?= h($nomina->relacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fechanomina') ?></th>
            <td><?= h($nomina->fechanomina) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nomina->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fechatramite') ?></th>
            <td><?= h($nomina->fechatramite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fechaefectos') ?></th>
            <td><?= h($nomina->fechaefectos) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Convocados') ?></h4>
        <?php if (!empty($nomina->convocados)): ?>
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
            <?php foreach ($nomina->convocados as $convocados): ?>
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
</div>
