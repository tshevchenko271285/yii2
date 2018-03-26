<?php


namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\web\HttpException;

class ProductController extends AppController {

    public function actionView(){
        $id = Yii::$app->request->get('id');
//        $product = Product::find()->with('category') //Жадная загрзка
//                  ->where(['id' => $id])->limit(1)->one();
        $product = Product::findOne($id); //Ленивая загрузка

        if( empty( $product ) ) {
            throw new HttpException(404, 'Такого товара не существует!');
        }

        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER | ' . $product->name, $product->keywords, $product->description );
        return $this->render('view', compact('product', 'hits') );
    }

}