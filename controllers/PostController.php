<?php 
// Test commit in PhpStorm
namespace app\controllers;

use Yii;
use app\models\Category;
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
		// Если пришел AJAX запрос
		if( Yii::$app->request->isAjax ) { 
			// Вернём глобальный массив $_POST
			return json_encode( Yii::$app->request->post() ); 
		}
		$model = new TestForm();
		// Если данные пришли методом POST
		if ($model->load( Yii::$app->request->post() ) ) {
			// Если валидация прошла успешно
			if ( $model->validate() ) {
				// Записываем флеш данные в сессию
				Yii::$app->session->setFlash('success', 'Данные приняты');
				// Очищаем форму
				return $this->refresh();
			} else {
				// Записываем флеш данные в сессию
				Yii::$app->session->setFlash('error', 'Ошибка!!!');
			}
		}


		$this->view->title = 'Все статьи'; // Определение Title
		return $this->render( 'test', compact( 'model' ) );
		
		// Отправка Данных в View
		// $arr = [1,2,3];
		// return $this->render('test', compact('arr') );
		// return $this->render('test', ['arr' => $arr, ] );
	
	}

    public function actionShow(){

		//$this->layout = 'basic'; // Установка layaut для данного action
		
		// Определение Title
		$this->view->title = 'Одна статья!'; 

		// Определение метатегов
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => 'Keywords Text']);
		$this->view->registerMetaTag(['name' => 'description', 'content' => 'Description Text']);

        $cats = Category::find()->where(['parent' => 692] )->all();

		return $this->render('show', compact('cats'));

	}
}