<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="hint">Los campos marcados con un <span class="errorMessage">asterisco (*)</span> son obligatorios.</p>
	
	<?php echo $form->errorSummary($model); ?>
	<table class="formulario">	
		<tr>
			<td><?php echo $form->labelEx($model,'username'); ?></td>
			<td>
			<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'username'); ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model,'password'); ?></td>
			<td>
			<?php 
			echo $form->passwordField($model,'password',array('size'=>40,'maxlength'=>40)); 
			echo $form->error($model,'password'); 
			?>
			</td>
		</tr>

		<tr>
			<td>
			<?php echo $form->labelEx($model,'nombre'); ?></td>
			<td>
			<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'nombre'); ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model,'mail'); ?></td>
			<td>
			<?php echo $form->textField($model,'mail',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'mail'); ?>
			</td>
		</tr>

		<tr>
			<td><?php echo $form->labelEx($model,'fono_contacto'); ?></td>
			<td>
			<?php echo $form->textField($model,'fono_contacto',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'fono_contacto'); ?>
			</td>
		</tr>
		<tr>
			<?php 
				if($model->isNewRecord == true){ //solo se permite modificar esto al crear usuario
					echo '<td>Es administrador?</td>';
					echo '<td>';
					echo CHtml::activeCheckBox($model, 'rol');
					echo '    -    <em>(No se podr&aacute; editar una vez guardado)</span>';
					echo '</td>';
				}
			?>
		</tr>
	</table>
		<?php 
		echo CHtml::submitButton($model->isNewRecord ? 'Crear Nuevo Usuario' : 'Guardar Cambios'); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->