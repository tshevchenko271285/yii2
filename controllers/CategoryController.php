<?php
/**
 * Created by PhpStorm.
 * User: Timofey
 * Date: 22.03.2018
 * Time: 8:35
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;



class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Product::find()->where([ 'hit' => '1' ])->limit(6)->all();
        return $this->render('index', compact( 'hits' ));
    }

    public function actionView(){
        $id = Yii::$app->request->get('id');
        $products = Product::find()->where( ['category_id' => $id] )->all();
        return $this->render('view', compact('products'));
    }
}