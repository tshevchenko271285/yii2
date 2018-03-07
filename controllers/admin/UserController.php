<?php 

namespace app\controllers\admin;

use yii\web\Controller;

class UserController extends Controller
{
	public function actionIndex( )
	{
		return $this->render('index');
	}
	public function actionBlogPost(){
		// If more one words
		return 'Blog Post';
	}
}