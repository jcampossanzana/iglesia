<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<h1>Bienvenido!</h1>
<h4>Administracion del Sitio</h4>

<ul>
	<li><?php echo CHtml::link('Gestion de Usuarios',array('users/index')); ?></li>
	<li><?php echo CHtml::link('Gestion de Menus',array('menu/index')); ?></li>
</ul>