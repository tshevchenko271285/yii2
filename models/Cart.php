<?php
/**
 * Created by PhpStorm.
 * User: Timofey
 * Date: 27.03.2018
 * Time: 10:57
 */

namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord {

    public function addToCart( $product, $qty = 1 ){
        if( isset( $_SESSION['cart'][$product->id] ) ) {
            $_SESSION['cart'][$product->id]['qty'] = (INT) $_SESSION['cart'][$product->id]['qty'] + (INT) $qty;
            $_SESSION['cart.qty'] = $_SESSION['cart.qty'] + $qty;
            $_SESSION['cart.sum'] = $_SESSION['cart.sum'] + $qty * $product->price;
        } else {
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img
            ];
            $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
            $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
        }
    }

}