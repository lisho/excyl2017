<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Puesto'), ['action' => 'edit', $puesto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Puesto'), ['action' => 'delete', $puesto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $puesto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Puestos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Puesto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Candidaturas'), ['controller' => 'Candidaturas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidatura'), ['controller' => 'Candidaturas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="puestos view large-9 medium-8 columns content">
    <h3><?= h($puesto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Puesto') ?></th>
            <td><?= h($puesto->puesto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($puesto->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($puesto->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Candidaturas') ?></h4>
        <?php if (!empty($puesto->candidaturas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Puesto Id') ?></th>
                <th scope="col"><?= __('Convocado Id') ?></th>
                <th scope="col"><?= __('Nota') ?></th>
                <th scope="col"><?= __('Observaciones') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($puesto->candidaturas as $candidaturas): ?>
            <tr>
                <td><?= h($candidaturas->id) ?></td>
                <td><?= h($candidaturas->puesto_id) ?></td>
                <td><?= h($candidaturas->convocado_id) ?></td>
                <td><?= h($candidaturas->nota) ?></td>
                <td><?= h($candidaturas->observaciones) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Candidaturas', 'action' => 'view', $candidaturas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Candidaturas', 'action' => 'edit', $candidaturas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Candidaturas', 'action' => 'delete', $candidaturas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidaturas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
