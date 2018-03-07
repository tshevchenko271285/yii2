<?php 

use app\assets\AppAsset;
use yii\helpers\Html;


AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	
	<div class="wrap">
		<div class="container">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<?php echo Html::a('Главная', '/web/', ['class' => 'nav-link'] ); ?>
				</li>
				<li class="nav-item">
					<?php echo Html::a('Статьи', ['post/index'], ['class' => 'nav-link'] ) ?>
				</li>
				<li class="nav-item">
					<?php echo Html::a('Статья', ['post/show'], ['class' => 'nav-link'] ) ?>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li> -->
			</ul>

<?php echo $content ?>

		</div>
	</div>

	

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>