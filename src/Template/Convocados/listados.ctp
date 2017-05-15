<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <header class="row">
        <div class="header-image">
            <?= $this->Html->image('escudo.svg',['style'=>['height:80px']]) ?>
            <h2 style="color:#fff">Ayuntamiento de León</h2>
        </div>
        <div class="header-title">
            <h1>Plan de Empleo Local 2017</h1>
        </div>
    </header>
<div class="btn-group" role="group" aria-label="...">
  <button id="btn1" type="button" class="btn btn-default btnselect">Oficial de Obras</button>
  <button id="btn2" type="button" class="btn btn-default btnselect">Oficial de Jardines</button>
  <button id="btn3" type="button" class="btn btn-default btnselect">Peón de Obras</button>
  <button id="btn4" type="button" class="btn btn-default btnselect">Peón de Jardines</button>
  <button id="btn5" type="button" class="btn btn-default btnselect">Conserje</button>
  <button id="btn6" type="button" class="btn btn-default btnselect">Auxiliar de Clínica</button>
</div>
<hr>
<div>
    <table id="datatable" class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th>dni</th>
                <th>nombre</th>
                <th>apellidos</th>
                <th>telefono</th>
                <th>nomina</th>
                <th>expediente</th>
                <th>Of. Obras</th>
                <th>Peón Obras</th>
                <th>Of. Jardines</th>
                <th>Peón Jardines</th>
                <th>Aux. Clínica</th>
                <th>Conserje</th>
                <!--<th></th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($convocados as $convocado): ?>
            <tr>
                <td><?= h($convocado->dni) ?></td>
                <td><?= h($convocado->nombre) ?></td>
                <td><?= h($convocado->apellidos) ?></td>
                <td><?= h($convocado->telefono) ?></td>
                <td><?= $convocado->has('nomina') ? $this->Html->link($convocado->nomina->id, ['controller' => 'Nominas', 'action' => 'view', $convocado->nomina->id]) : '' ?></td>
                <td><?= $convocado->has('expediente') ? $this->Html->link($convocado->expediente->id, ['controller' => 'Expedientes', 'action' => 'view', $convocado->expediente->id]) : '' ?></td>
                <td>
                <?php foreach ($convocado->candidaturas as $c): ?>
                    
                        <?php if ($c->puesto_id == 1): ?>
                             <i class="fa fa-check-square-o"></i>   
                             <span class="hidden">oficialobras</span>    
                        <?php endif; ?>
                        
                <?php endforeach; ?>
                </td>
                <td>
                <?php foreach ($convocado->candidaturas as $c): ?>
                    
                        <?php if ($c->puesto_id == 4): ?>
                             <i class="fa fa-check-square-o"></i> 
                             <span class="hidden">peonobras</span>        
                        <?php endif; ?>
                    
                <?php endforeach; ?>
                </td>
                <td>
                <?php foreach ($convocado->candidaturas as $c): ?>
                    
                        <?php if ($c->puesto_id == 2): ?>
                             <i class="fa fa-check-square-o"></i> 
                             <span class="hidden">oficialjardines</span>        
                        <?php endif; ?>
                    
                <?php endforeach; ?>
                </td>
                <td>
                <?php foreach ($convocado->candidaturas as $c): ?>
                    
                        <?php if ($c->puesto_id == 3): ?>
                             <i class="fa fa-check-square-o"></i>
                             <span class="hidden">peonjardines</span>       
                        <?php endif; ?>
                    
                <?php endforeach; ?>
                </td>
                <td>
                <?php foreach ($convocado->candidaturas as $c): ?>
                    
                        <?php if ($c->puesto_id == 6): ?>
                             <i class="fa fa-check-square-o"></i>
                             <span class="hidden">auxiliar</span>         
                        <?php endif; ?>
                    
                <?php endforeach; ?>
                </td>
                <td>
                <?php foreach ($convocado->candidaturas as $c): ?>
                    
                        <?php if ($c->puesto_id == 5): ?>
                             <i class="fa fa-check-square-o"></i> 
                             <span class="hidden">conserje</span>        
                        <?php endif; ?>
                    
                <?php endforeach; ?>
                </td>
                
                <!--
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $convocado->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $convocado->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $convocado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $convocado->id)]) ?>
                </td>
                -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>