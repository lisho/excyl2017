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
                ['action' => 'delete', $expediente->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $expediente->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Expedientes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Convocados'), ['controller' => 'Convocados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Convocado'), ['controller' => 'Convocados', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participantes'), ['controller' => 'Participantes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Participante'), ['controller' => 'Participantes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="expedientes form large-9 medium-8 columns content">
    <?= $this->Form->create($expediente) ?>
    <fieldset>
        <legend><?= __('Edit Expediente') ?></legend>
        <?php
            echo $this->Form->control('numedis');
            echo $this->Form->control('numhs');
            echo $this->Form->control('ceas');
            echo $this->Form->control('domicilio');
            echo $this->Form->control('observaciones');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
