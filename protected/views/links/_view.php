<?php
/* @var $this LinksController */
/* @var $data Links */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />
	<b>Acciones:</b> <br/>
	<?php echo CHtml::link(CHtml::encode(' [Ver]', array('view', 'id'=>$data->id_link))); ?>
	<?php echo CHtml::link(CHtml::encode(' [Editar]', array('update', 'id'=>$data->id_link))); ?>
</div>