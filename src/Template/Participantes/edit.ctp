<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $participante->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $participante->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Participantes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Relations'), ['controller' => 'Relations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Relation'), ['controller' => 'Relations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expedientes'), ['controller' => 'Expedientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expediente'), ['controller' => 'Expedientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="participantes form large-9 medium-8 columns content">
    <?= $this->Form->create($participante) ?>
    <fieldset>
        <legend><?= __('Edit Participante') ?></legend>
        <?php
            echo $this->Form->control('dni');
            echo $this->Form->control('sexo');
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellidos');
            echo $this->Form->control('telefono');
            echo $this->Form->control('email');
            echo $this->Form->control('foto');
            echo $this->Form->control('observaciones');
            echo $this->Form->control('relation_id', ['options' => $relations]);
            echo $this->Form->control('nacimiento', ['empty' => true]);
            echo $this->Form->control('expediente_id', ['options' => $expedientes]);
            echo $this->Form->control('desactivado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
