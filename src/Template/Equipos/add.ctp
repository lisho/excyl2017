<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Equipos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="equipos form large-9 medium-8 columns content">
    <?= $this->Form->create($equipo) ?>
    <fieldset>
        <legend><?= __('Add Equipo') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('tipo');
            echo $this->Form->control('entidad');
            echo $this->Form->control('aas');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>