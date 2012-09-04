<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php 
		echo $form->labelEx($model,'parent');  
		echo $form->dropDownList($model,'parent', 
			CHtml::listData(
				Menu::model()->findAll('parent IS NULL ORDER BY weight DESC'), 
				'id_menu', //value
				'title' //text to show
				), 
			array('empty'=>'Seleccione...')
		); 
		echo $form->error($model,'parent'); 
		
		?>
	</div>

	<div class="row">
		Indique el peso del menu. 
		<?php echo $form->textField($model,'weight'); ?>
		<?php echo $form->error($model,'weight'); ?>
		<br/>
		<div class="hint">
			El peso define el orden en que este &iacute;tem aparecer&aacute; en el men&uacute;.<br/>
			Valores posibles 0 - 9. Cero representa de los primeros y 9 de los &uacute;ltimos.<br/>
			Cuando este campo no se asigna, por defecto el sistema lo deja como &uacute;ltimo.
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->