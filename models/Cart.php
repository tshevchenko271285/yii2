<?php
/**
 * Created by PhpStorm.
 * User: Timofey
 * Date: 27.03.2018
 * Time: 10:57
 */

namespace app\models;
use yii\base\Model;

class Cart extends  Model {

    public function addToCart( $product, $qty = 1 ){

        echo 'Worked'; die;

    }

}