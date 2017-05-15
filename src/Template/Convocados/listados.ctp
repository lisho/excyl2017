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
<button id="btntodos" type="button" class="btn btn-warning btnselect">Todos</button>
  <button id="btn1" type="button" class="btn btn-default btnselect">Oficial de Obras</button>
  <button id="btn2" type="button" class="btn btn-default btnselect">Oficial de Jardines</button>
  <button id="btn3" type="button" class="btn btn-default btnselect">Peón de Obras</button>
  <button id="btn4" type="button" class="btn btn-default btnselect">Peón de Jardines</button>
  <button id="btn5" type="button" class="btn btn-default btnselect">Conserje</button>
  <button id="btn6" type="button" class="btn btn-default btnselect">Auxiliar de Clínica</button>
</div>
<a href="../" title=""><i class="fa fa-home text-right btn btn-info"></i></a>
<hr>
<div>
    <table id="datatable" class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th></th>
                <th>dni</th>
                <th>nombre</th>
                <th>apellidos</th>
                
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
                <td>

                    <?php if (in_array($convocado['dni'],array_keys($dni_nomina))): ?>
                         
                        <?php if($dni_nomina[$convocado['dni']]=="Estructural"){echo "E";}
                            elseif($dni_nomina[$convocado['dni']]=="Coyuntural"){echo "C";} ?>

                    <?php elseif(in_array($convocado['dni'],array_keys($dni_suspensiones))): ?>
                        <?php if($dni_suspensiones[$convocado['dni']]=="Estructural"){echo "E";}
                            elseif($dni_suspensiones[$convocado['dni']]=="Coyuntural"){echo "C";} ?>
                    <?php endif; ?>

                </td>
                <td><?= h($convocado->dni) ?></td>
                <td><?= h($convocado->nombre) ?></td>
                <td><?= h($convocado->apellidos) ?></td>
                
                <td>
                <?php if (in_array($convocado['dni'],array_keys($dni_nomina))): ?>
                      <span><i class='fa fa-check-square-o verde'></i></span>
                <?php elseif(in_array($convocado['dni'],array_keys($dni_suspensiones))): ?>
                      <span><i class='fa fa-check-square-o amarillo'></i> </span>            
                <?php endif; ?>
                </td>
                <td> 
                <?php if (isset($lista_expedientes[$convocado['dni']])): ?>
                        <a href="http://edis.lishowebproject.a2hosted.com/expedientes/view/<?= $lista_expedientes[$convocado['dni']]['id'];?>" title="" target="_blank"><?= $lista_expedientes[$convocado['dni']]['numedis']; ?></a>
                           
                <?php endif; ?>
                    
                </td>
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