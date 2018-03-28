<?php

namespace app\controllers;

use app\models\Product;
use app\models\Cart;
use Yii;


class CartController extends AppController {

    public function actionAdd() {

        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if( empty( $product ) ) echo false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionClear() {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem() {

        $id = Yii::$app->request->get('id');

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->recalc($id);

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionIncItem(){
        $id = Yii::$app->request->get('id');

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->incProduct($id);

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDecItem(){
        $id = Yii::$app->request->get('id');

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->decProduct($id);

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));

    }

    public function actionShow() {

        $id = Yii::$app->request->get('id');

        $session = Yii::$app->session;
        $session->open();

        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

}