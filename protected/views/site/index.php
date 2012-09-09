<?php $this->pageTitle=Yii::app()->name;?>
	<div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
<?php	$this->widget('application.extensions.nivoslider.CNivoSlider', array(
		'htmlOptions'=>array('class' => 'nivo shadow'),
		'images'=>array( //@array images with images arrays.
				array(
						'src'=> Yii::app()->request->baseUrl.'/images/nemo.jpg',
						'caption'=>'Picture two',
						'linkOptions'=>array(),
					
				),
				
				array(
						'src'=> Yii::app()->request->baseUrl.'/images/walle.jpg',
						'caption'=>'Picture two',
						'linkOptions'=>array(),
					
				),
				
				array(
						'src'=> Yii::app()->request->baseUrl.'/images/toystory.jpg',
						'caption'=>'Picture two',
						'linkOptions'=>array(),
					
				),
				
				array(
						'src'=> Yii::app()->request->baseUrl.'/images/up.jpg',
						'caption'=>'Picture two',
						'linkOptions'=>array(),
					
				),
			)
		)
	);
?>
</div>
</div>
<div id="destacado">
	<div class="post"><h1>Bienvenidos!!</h1></div>
	<p>Le damos la bienvenida al sitio de la Iglesia Adventista de Vi&ntilde;a del Mar, aqui encontrar&aacute; informaciones y recursos para participar en las diferentes actividades que se llevan a cabo en la iglesia.</p>
	<p align="center"><em>Que Dios les bendiga!</em></p>
	<div id="destacado-right"></div>
	<div id="desctacado-left"></div>
</div>
<div id="elements">
<?php 

$posts = Post::model()->findAll();
foreach($posts as $post){?>
	<div id="item" class="shadow">
	<span class="item-title" ><?php echo $post->title;?></span><br/>
	<?php
		$this->widget('ext.lorempixel.LoremPixel', array(
			'width'         => 230,
			'height'        => 150,
		)); 
	?>
	
	<p><?php echo $post->content;?></p>
	<p align="left"><a href="#">Ver m&aacute;s ...</a></p>
	</div>
	
	<?php
}
?>
</div>