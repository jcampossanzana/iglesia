<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Abrasive
Description: A two-column, fixed-width design with dirty looks.
Version    : 1.0
Released   : 20081122
  
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- viewport para iphone -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" media="screen  and (min-width: 40.5em)" />
	<!--[if (lt IE 9)&(!IEMobile)]>
	<link rel="stylesheet" type="text/css" href="enhanced.css" />
	<![endif]-->

	<link type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/menu.css" rel="stylesheet" media="screen  and (min-width: 40.5em)"/>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/menu.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mobile.css" media="screen and (max-device-width:480px)" />
	<script type="text/javascript">
		jQuery(document).ready(function($){

			/* prepend menu icon */
			$('#nav-wrapp').prepend('<div id="menu-icon">Menu</div>');
			
			/* toggle nav */
			$("#menu-icon").on("click", function(){
				$(".menu").slideToggle();
				$(this).toggleClass("active");
				$(".menu li").each(function(){
					if($(this).text() == ""){
						$(this).remove();
					} else if($(this).text() == " "){
						$(this).remove();
					}
				});
			});
			
			

		});
	</script>
</head>
<body>
<div id="search">
	<div id="search-container">
		<div id="widget">
			<h4 class="mobile-hidden">B&uacute;squeda R&aacute;pida</h4>
			<div id="searchwrapper">
				<form action="#" method="post">
					<input type="text" class="searchbox" name="param" placeholder="Buscar..." />
					<input type="image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/search.png" class="searchbox_submit mobile-hidden" />
					<input type="submit" class="mobile-only" />
				</form>
			</div>
		</div>
	</div>
</div>

<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" class="logo"/></h1>
		</div>
				<!-- end menu-->
	</div>
	
	
	
	<!-- end #header -->
	<div id="menu">
		<div id="nav-wrapp" class="mobile-only"></div>
		<ul class="menu">
		<?php print_menu(); ?>
		<?php
			$this->widget('zii.widgets.CMenuIglesia', 
				array(
					'items'=>array(
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)
			);  
		?>
		</ul>
	</div>
	<div id="page">
		<div id="bgtop">
			<div id="bgbottom">
			
				<div id="breadcrumbs">
					<?php  if(isset($this->breadcrumbs)):?>
							<?php $this->widget('zii.widgets.CBreadcrumbs', array(
								'links'=>$this->breadcrumbs,
							)); ?><!-- breadcrumbs -->
					<?php endif?>
				</div>
				<?php echo $content; ?>
				<!-- end #content -->
				<div id="sidebar">
					<ul>
						<li>
							<h2>Enlaces</h2>
							<ul>
								<li><a href="#">Morbi ante sem aliquam</a></li>
							</ul>
						</li>
						<li>
							<h2>Post mas leidos</h2>
							<ul>
								<li><a href="#">Morbi ante sem aliquam</a></li>
								<li><a href="#">Nec turpis vel pulvinar</a></li>
							</ul>
						</li>
						<li>
							<h2>Galerias</h2>
							<ul>
								<li><a href="#">Morbi ante sem aliquam</a></li>
								<li><a href="#">Nec turpis vel pulvinar</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
	<div id="footer">
		Iglesia Adventista del S&eacute;ptimo D&iacute;a - Vi&ntilde;a del Mar Centro.<br/>
		Derechos e izquierdos reservados.<br/>
		<?php echo Yii::powered(); ?>
	</div>
	<!-- end #footer -->
</div>

<?php 
	function print_menu(){
		$menus =  Menu::model()->findAll(array('order' => 'weight'));
		foreach($menus as $menuItem){
			//solo para menus principales
			if($menuItem->parent == null){
				echo '<li>';
				renderItem($menuItem);		
				 lookSubmenu($menuItem, $menus);
				echo '<li>';
			}
		}
	}
	
	function lookSubmenu($menu, $menus){
		$menu_id = $menu->id_menu;
		$submenus = array();
		foreach($menus as $item){
			if($item->parent == $menu_id){
				$submenus[] = $item;
			}
		}
		if(count($submenus) > 0){
			echo '<div><ul>';
			foreach($submenus as $subitem){
				echo '<li>';
				renderItem($subitem);
				echo '</li>';
			}
			echo '</ul></div>';
		}
	}
	function renderItem($item){
		echo '<a href="'.Yii::app()->request->baseUrl.'/'.$item->link.'"><span>'.$item->title.'</span></a>';
	}
	
?>
<!-- end #wrapper -->
<!--
llamar: <a href="tel:+18005550199">1-800-555-0199</a>
-->
</body>
</html>

	