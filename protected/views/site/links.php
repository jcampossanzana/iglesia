<h1>P&aacute;ginas Amigas</h1>
<?php 
	$links = Links::model()->findAll();
	foreach($links as $link){
		echo '<div id="link">';
		echo '<h3>'.$link->title.'</h3>';
		echo $link->description.'<br/>';
		echo '<a href="'.$link->link.'">'.$link->link.'</a>';
		echo '</div>';
	}
?>