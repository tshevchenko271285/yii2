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
			type: 'GET',
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
