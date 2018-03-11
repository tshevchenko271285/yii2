<?php 

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

    /**
     * @return string
     */
    public function actionShow(){

		//$this->layout = 'basic'; // Установка layaut для данного action
		
		// Определение Title
		$this->view->title = 'Одна статья!'; 

		// Определение метатегов
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => 'Keywords Text']);
		$this->view->registerMetaTag(['name' => 'description', 'content' => 'Description Text']);

		// Выборка всех данных
//        $cats = Category::find()->all();
//        $cats = Category::find()->orderBy( ['id' => SORT_DESC] )->all();
            // Метод " ->asArray() " возвращает записи из таблице в виде многомерного массива а не объектов
//        $cats = Category::find()->asArray()->all();
            // Метод " ->where " принимает строку
//        $cats = Category::find()->asArray()->where( 'parent=691' )->all();
            // Метод " ->where " принимает массив [ 'поле' => 'значение' ]
//        $cats = Category::find()->asArray()->where( [ 'parent' => 691 ] )->all();
            // Метод " ->where " принимает массив [ 'оператор', 'имя поля', 'значение' ]
//        $cats = Category::find()->asArray()->where( [ 'parent' => 691 ] )->all();
//        $cats = Category::find()->asArray()->where( ['like', 'title', 'pp' ] )->all();
            // Метод ->limit(1) Выбает одну запись из таблицы
//        $cats = Category::find()->asArray()->where('id=691')->limit(1)->all();
            // Метод ->one() Выбает все записи ! Но отображает только одну в одномерном массиве
//        $cats = Category::find()->asArray()->where('id=691')->one();
//        $cats = Category::find()->asArray()->count();
//        $cats = Category::findOne(['id' => 691]);
//        $cats = Category::findAll(['parent' => 691]);
            // Использование собственного SQL запроса
//        $sql = "SELECT * FROM categories WHERE title LIKE '%pp%'";
//        $cats = Category::findBySql($sql)->all();
            // Использование собственного SQL запроса с передачей параметров, параметры экранируются самостоятельно
//        $sql = "SELECT * FROM categories WHERE title LIKE :search";
//        $cats = Category::findBySql($sql, [':search' => '%pp%'])->all();




		return $this->render('show', compact('cats'));

	}
}