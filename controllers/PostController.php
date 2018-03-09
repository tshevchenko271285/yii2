<?php 

namespace app\controllers;

use Yii;

class PostController extends AppController
{
	public $layout = 'basic'; // Set Layout for the Controller

	public function beforeAction($action){
		// При переходе на Action Index
		if ( $action->id == 'index' ) {
			// Oтключаем Csrf защиту
			$this->enableCsrfValidation = false;
		}
		return parent::beforeAction($action);
	}

	public function actionIndex(){

		if( Yii::$app->request->isAjax ) { // Если пришел AJAX запрос
			return json_encode( Yii::$app->request->post() ); // Вернём глобальный массив $_POST
		}

		$arr = [1,2,3];
		return $this->render('test', compact('arr') );
		return $this->render('test', ['arr' => $arr, ] );
	}

	public function actionShow(){

		//$this->layout = 'basic'; // Set Layout for the Action
		
		$this->view->title = 'Одна статья!'; // Определение Title

		$this->view->registerMetaTag(['name' => 'keywords', 'content' => 'Keywords Text']);// Определение метатега
		$this->view->registerMetaTag(['name' => 'description', 'content' => 'Description Text']);// Определение метатега

		return $this->render('show');
	}
}