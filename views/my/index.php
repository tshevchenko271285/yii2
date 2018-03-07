

<h1>Action Index</h1>
<h4><?= $hi ?></h4>

<ul>
	<?php 
		foreach ($names as $name) {
			echo '<li>'.$name.'</li>';
		}
	?>
</ul>
<?php if ( $id ): ?>
	<p><?php echo 'It is $_GET variable id: <b>' . $id ?></b></p>
<?php endif ?>

