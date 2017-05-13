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
                ['action' => 'delete', $valoracion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $valoracion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Valoracions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Convocados'), ['controller' => 'Convocados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Convocado'), ['controller' => 'Convocados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="valoracions form large-9 medium-8 columns content">
    <?= $this->Form->create($valoracion) ?>
    <fieldset>
        <legend><?= __('Edit Valoracion') ?></legend>
        <?php
            echo $this->Form->control('convocado_id', ['options' => $convocados]);
            echo $this->Form->control('puede');
            echo $this->Form->control('sabe');
            echo $this->Form->control('quere');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
