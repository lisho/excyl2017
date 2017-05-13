<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Valoracion'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Convocados'), ['controller' => 'Convocados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Convocado'), ['controller' => 'Convocados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="valoracions index large-9 medium-8 columns content">
    <h3><?= __('Valoracions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('convocado_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puede') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sabe') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quere') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($valoracions as $valoracion): ?>
            <tr>
                <td><?= $this->Number->format($valoracion->id) ?></td>
                <td><?= $valoracion->has('convocado') ? $this->Html->link($valoracion->convocado->id, ['controller' => 'Convocados', 'action' => 'view', $valoracion->convocado->id]) : '' ?></td>
                <td><?= h($valoracion->puede) ?></td>
                <td><?= h($valoracion->sabe) ?></td>
                <td><?= h($valoracion->quere) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $valoracion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $valoracion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $valoracion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valoracion->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
