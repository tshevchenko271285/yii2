<?php

namespace app\controllers;


use app\models\Order;
use app\models\OrderItems;
use app\models\Product;
use app\models\Cart;
use Yii;


class CartController extends AppController {

    public function actionAdd() {
        $id = Yii::$app->request->get('id');
        $qty = (INT) Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if( empty( $product ) ) echo false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        /*if( !Yii::$app->request->isAjax ){  !!! Не работает редирект!
            return $this->redirect(Yii::$app->request->referrer);
        }*/
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

    public function actionView(){
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Корзина');
        $order = new Order();
        if( $order->load( Yii::$app->request->post() ) ) {
            debug( Yii::$app->request->post() );
        }
        return $this->render('view', compact('session', 'order'));
    }

}