<?php 

namespace app\controllers;

use Yii;
use app\models\TestForm;

class PostController extends AppController
{
	public $layout = 'basic'; // Set Layout for the Controller

/*	// Отключение CSRF защиты
	public function beforeAction($action){
		// При переходе на Action Index
		if ( $action->id == 'index' ) {
			// Oтключаем Csrf защиту
			$this->enableCsrfValidation = false;
		}
		// Вызываем радительский метод и передаем в него отредактированный $action
		return parent::beforeAction($action);
	}
*/
	public function actionIndex(){

		if( Yii::$app->request->isAjax ) { // Если пришел AJAX запрос
			return json_encode( Yii::$app->request->post() ); // Вернём глобальный массив $_POST
		}

		$model = new TestForm();
		$this->view->title = 'Все статьи'; // Определение Title
		return $this->render( 'test', compact( 'model' ) );
	/*	// Отправка Данных в View
		$arr = [1,2,3];
		return $this->render('test', compact('arr') );
		return $this->render('test', ['arr' => $arr, ] );
	*/
	}

	public function actionShow(){

		//$this->layout = 'basic'; // Установка layaut для этого action
		
		$this->view->title = 'Одна статья!'; // Определение Title

		$this->view->registerMetaTag(['name' => 'keywords', 'content' => 'Keywords Text']);// Определение метатега
		$this->view->registerMetaTag(['name' => 'description', 'content' => 'Description Text']);// Определение метатега

		return $this->render('show');
	}
}