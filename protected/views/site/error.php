<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div id="error">
	<div id="error-logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/error.png" /></div>
	<div id="error-description">
		<h1>Oooops!!!</h1>
		<p>Parece que lo que anda buscando no se encuentra disponible.</p>
		<b>Reason: </b><span class="courier">ERROR <?php echo $code.' - '.CHtml::encode($message); ?></span>
		<p><a href="#">Volver a la p&aacute;gina principal</a></p>
	</div>
</div>
