<?php 

namespace app\controllers;

use yii\web\Controller;


class AppController extends Controller {

	// public $layout = 'basic'; // Set Layout for the Controller

	public function debug($arr){
		echo '<pre>' . var_dump($arr, true) . '</pre>';
	}

}

