<h1>Importando archivo txt - Lista de Convocados</h1>
<br><br>
<fieldset>
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Carga un archivo de nómina en formato txt<span class="required">*</span></label>
    
    <div class="form-group">
         <div class="col-md-6 col-sm-6 col-xs-12">
            <?php echo $this->Form->create($convocado,['type'=>'file','class'=>'form-horizontal form-label-left data-parsley-validate=""']); ?>
                    
                    <?= $this->Form->file('convocado', [
                                                        //'type'=>'file',
                                                        //'label'=>'Selecciona un archivo para añadir la foto de perfil:'
                                                        ]); ?>  
        </div>
    </div>
</fieldset>             

<fieldset>
    <span class="label label-default">Código de convocatoria</span>
    <div class="form-group">
         <div class="col-md-6 col-sm-6 col-xs-12">
            <?= $this->Form->input('codigo');?>
        </div>
    </div>
</fieldset> 
<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <?= $this->Form->button(__('Cargar'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('Cancelar'), ['action'=>'index'],['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?php echo $this->Form->end(); ?>
