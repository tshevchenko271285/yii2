<?php 

namespace app\controllers;

use Yii;

class PostController extends AppController
{
	public $layout = 'basic'; // Set Layout for the Controller

	public function actionIndex(){


		if( Yii::$app->request->isAjax ) {
			return json_encode($_GET);
		}

		$arr = [1,2,3];
		return $this->render('test', compact('arr') );
		return $this->render('test', ['arr' => $arr, ] );
	}

	public function actionShow(){

		//$this->layout = 'basic'; // Set Layout for the Action

		return $this->render('show');
	}
}