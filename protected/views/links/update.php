<?php
/* @var $this LinksController */
/* @var $model Links */

$this->breadcrumbs=array(
	'Links'=>array('index'),
	$model->title=>array('view','id'=>$model->id_link),
	'Update',
);

$this->menu=array(
	array('label'=>'List Links', 'url'=>array('index')),
	array('label'=>'Create Links', 'url'=>array('create')),
	array('label'=>'View Links', 'url'=>array('view', 'id'=>$model->id_link)),
	array('label'=>'Manage Links', 'url'=>array('admin')),
);
?>

<h1>Update Links <?php echo $model->id_link; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>