<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
	'Gestion de Usuarios',
);

$this->menu = array(
	array('label'=>'Nuevo Usuario', 'url'=>array('create')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);

?>

<h1>Gesti&oacute;n de Usuarios</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
        //remove the column name listed here
				'id_usuario',
                'username',
                'nombre',
                'mail',
				'fono_contacto',
                array(
                        'class'=>'CButtonColumn',
                ),
        ),
)); 
?>
