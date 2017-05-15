<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Convocados'), ['action' => 'index']) ?></li>
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
<div class="convocados form large-9 medium-8 columns content">
    <?= $this->Form->create($convocado) ?>
    <fieldset>
        <legend><?= __('Add Convocado') ?></legend>
        <?php
            echo $this->Form->control('dni');
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellidos');
            echo $this->Form->control('telefono');
            echo $this->Form->control('nomina_id', ['options' => $nominas, 'empty' => true]);
            echo $this->Form->control('expediente_id', ['options' => $expedientes, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
