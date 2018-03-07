<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;

class TestController extends AppController
{
	public function actionTest()
	{
		return $this->render('test');

		//return 'test';
	}
	public function actionIndex()
	{
		return 'Hello a`m Index Action in Test Controller.';
	}
}