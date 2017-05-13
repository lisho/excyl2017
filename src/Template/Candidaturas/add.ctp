<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Candidaturas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Puestos'), ['controller' => 'Puestos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Puesto'), ['controller' => 'Puestos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Convocados'), ['controller' => 'Convocados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Convocado'), ['controller' => 'Convocados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="candidaturas form large-9 medium-8 columns content">
    <?= $this->Form->create($candidatura) ?>
    <fieldset>
        <legend><?= __('Add Candidatura') ?></legend>
        <?php
            echo $this->Form->control('puesto_id', ['options' => $puestos]);
            echo $this->Form->control('convocado_id', ['options' => $convocados]);
            echo $this->Form->control('nota');
            echo $this->Form->control('observaciones');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
