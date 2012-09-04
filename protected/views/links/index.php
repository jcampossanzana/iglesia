<?php
/* @var $this LinksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Links',
);

$this->menu=array(
	array('label'=>'Crear Links', 'url'=>array('create')),
	array('label'=>'Administrar Links', 'url'=>array('admin')),
);
?>

<h1>Links</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
