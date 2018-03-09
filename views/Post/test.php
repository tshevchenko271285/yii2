<?php 
	use yii\widgets\ActiveForm;
	//use yii\widgets\ActiveField;
	use yii\helpers\Html;

?>
<h1>Test Action</h1>

<?php $form = ActiveForm::begin( ['options' => ['id' => 'testForm' ] ] ); ?>
<?= $form->field($model, 'name')->input('name') ?>	
<?= $form->field($model, 'email')->input('email') ?>	
<?= $form->field($model, 'text')->textarea([ 'rows' => 5 ]) ?>
<?= Html::submitButton('Отправить', ['class'=> 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>