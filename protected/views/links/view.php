<?php
/* @var $this LinksController */
/* @var $model Links */

$this->breadcrumbs=array(
	'Links'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Links', 'url'=>array('index')),
	array('label'=>'Create Links', 'url'=>array('create')),
	array('label'=>'Update Links', 'url'=>array('update', 'id'=>$model->id_link)),
	array('label'=>'Delete Links', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_link),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Links', 'url'=>array('admin')),
);
?>

<h1>View Links #<?php echo $model->id_link; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_link',
		'title',
		'description',
		'link',
	),
)); ?>
