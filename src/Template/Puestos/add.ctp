<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Puestos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Candidaturas'), ['controller' => 'Candidaturas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Candidatura'), ['controller' => 'Candidaturas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="puestos form large-9 medium-8 columns content">
    <?= $this->Form->create($puesto) ?>
    <fieldset>
        <legend><?= __('Add Puesto') ?></legend>
        <?php
            echo $this->Form->control('puesto');
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
