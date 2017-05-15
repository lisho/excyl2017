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
                ['action' => 'delete', $suspension->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $suspension->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Suspensions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="suspensions form large-9 medium-8 columns content">
    <?= $this->Form->create($suspension) ?>
    <fieldset>
        <legend><?= __('Edit Suspension') ?></legend>
        <?php
            echo $this->Form->control('provincia');
            echo $this->Form->control('CCLL');
            echo $this->Form->control('CEAS');
            echo $this->Form->control('HS');
            echo $this->Form->control('UC');
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
