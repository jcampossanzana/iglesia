<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	$model->title=>array('view','id'=>$model->id_menu),
	'Update',
);

$this->menu=array(
	array('label'=>'List Menu', 'url'=>array('index')),
	array('label'=>'Create Menu', 'url'=>array('create')),
	array('label'=>'View Menu', 'url'=>array('view', 'id'=>$model->id_menu)),
	array('label'=>'Manage Menu', 'url'=>array('admin')),
);
?>

<h1>Update Menu <?php echo $model->id_menu; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>