<?php 
	use yii\widgets\ActiveForm;
	//use yii\widgets\ActiveField;
	use yii\helpers\Html;

?>
<h1>Test Action</h1>

<!-- Если в сессии есть флеш данные SUCCESS покажим Alert -->
<?php if( Yii::$app->session->hasFlash( 'success' ) ): ?>
		<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo Yii::$app->session->getFlash( 'success' ) ?>
	</div>
<?php endif; ?>

<!-- Если в сессии есть флеш данные ERROR покажим Alert -->
<?php if ( Yii::$app->session->hasFlash( 'error' ) ): ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo Yii::$app->session->getFlash( 'error' ) ?>
	</div>
<?php endif ?>

<!-- Начал вывода формы -->
<?php $form = ActiveForm::begin( ['options' => ['id' => 'testForm' ], 'method' => 'post' ] ); ?>

	<?= $form->field($model, 'name')->input('name') ?>	
	<?= $form->field($model, 'email')->input('email') ?>	
	<?= $form->field($model, 'text')->textarea([ 'rows' => 5 ]) ?>

	<!-- Использование хелпера для вывода кнопки -->
	<?= Html::submitButton('Отправить', ['class'=> 'btn btn-success']) ?>
<!-- Конец вывода формы -->
<?php ActiveForm::end(); ?>

