<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Nominas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Convocados'), ['controller' => 'Convocados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Convocado'), ['controller' => 'Convocados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nominas form large-9 medium-8 columns content">
    <?= $this->Form->create($nomina) ?>
    <fieldset>
        <legend><?= __('Add Nomina') ?></legend>
        <?php
            echo $this->Form->control('CCLL');
            echo $this->Form->control('CEAS');
            echo $this->Form->control('HS');
            echo $this->Form->control('RGC');
            echo $this->Form->control('CLASIFICACION');
            echo $this->Form->control('MIEMBROS');
            echo $this->Form->control('dni');
            echo $this->Form->control('nombrecompleto');
            echo $this->Form->control('SEXO');
            echo $this->Form->control('EDAD');
            echo $this->Form->control('NACIONALIDAD');
            echo $this->Form->control('DOMICILIO');
            echo $this->Form->control('fechatramite');
            echo $this->Form->control('RESOLUCION');
            echo $this->Form->control('fechaefectos');
            echo $this->Form->control('relacion');
            echo $this->Form->control('fechanomina');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
