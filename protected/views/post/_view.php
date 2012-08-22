<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_post')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_post), array('view', 'id'=>$data->id_post)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen')); ?>:</b>
	<?php echo CHtml::encode($data->imagen); ?>
	<br />
</div>