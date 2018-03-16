<?php 
	// $this->title = 'Одна статья';
?>

<?php $this->beginBlock('blockName'); ?>
	<h1>Hello !</h1>
<?php $this->endBlock('blockName'); ?>

<?php //debug( $cats ); ?>

<!--Отложенная загрузка-->
<?php //echo count($cats->products)  ?>
<?php //debug( $cats ); ?>

    <!--Жадная загрузка-->
<?php //debug( $cats ); ?>

<?php
foreach ($cats as $cat) {
    echo '<ul>';
        echo '<li>' . $cat->title . '</li>';
        $products = $cat->products;
        foreach ($products as $product) {
            echo '<ul>';
                echo '<li>' . $product->title .'</li>';
            echo '</ul>';
        }
    echo '</ul>';
}
?>

<h1>Show Action</h1>
<button id="btn" class="btn btn-success">Click me...</button>
<?php 
// 	Подключение скрипта в шаблоне / 
//	'depends' - Зависимости, класс взят с app\assets\AppAsset.php 
$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']); 

// Подключение скрипта
$code = <<<JS
	$('#btn').on('click', function(){
		$.ajax({
			url: 'index.php?r=post/index',
			data: { test: '123' },
			type: 'POST',
			success: function(res){
				console.log(res);
			},
			error: function(err){
				console.warn(err);
			},
		})
	})
JS;
$this->registerJs( $code, \yii\web\View::POS_LOAD );

// Подключение CSS файла 
//	'depends' - Зависимости, класс взят с app\assets\AppAsset.php 
//$this->registerCssFile('@web/css/style.css', ['depends' => 'yii\bootstrap\BootstrapAsset']);

//Подключение Стилей
//$this->registerCss('h1 { color: blue }');
