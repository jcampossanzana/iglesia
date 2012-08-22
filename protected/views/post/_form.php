<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php 
			$this->widget('application.extensions.cleditor.ECLEditor', array(
				'model'=>$model,
				'attribute'=>'content', //Model attribute name. Nome do atributo do modelo.
				'options'=>array(
					'width'=>'600',
					'height'=>250,
					'useCSS'=>true,
				),
				'value'=>$model->content, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
			));
			?>
	</div>

	<div class="row">
		Publicado? 
		<?php echo CHtml::activeCheckBox($model, 'status'); ?>
		
		<?php echo $form->error($model,'status'); ?>
	</div>
	<div class="row">
	Imagen:<br/>
	(max. 2 mb)
	
	
	<?php
		echo $form->fileField($model, 'image');
		echo $form->error($model,'image');
		
	?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->