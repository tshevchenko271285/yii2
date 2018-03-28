<?php

use \yii\helpers\Url;
use yii\helpers\Html;

?>

<?php if( !empty( $session['cart'] ) ) : ?>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Фото</td>
                        <td class="description"></td>
                        <td class="price">Цена</td>
                        <td class="quantity">Количество</td>
                        <td class="total">Всего</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($session['cart'] as $key => $item) : ?>
                        <?php if( !$item['name'] ) continue; ?>
                            <tr>
                                <td class="cart_product">
                                    <a href="<?= Url::to(['product/view', 'id' => $key ])?>">
                                        <?= Html::img("@web/images/product/{$item['img']}", ['alt' =>  $item['name']]); ?>
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="<?= Url::to(['product/view', 'id' => $key ])?>"><?= $item['name'] ?></a></h4>
                                    <p>Web ID: <?= $key ?></p>
                                </td>
                                <td class="cart_price">
                                    <p>$<?= $item['price'] ?></p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href=""> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="<?= $item['qty'] ?>" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href=""> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">$<?= $item['price'] * $item['qty'] ?></p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
<?php else : ?>
    <h3>Корзина пуста</h3>
<?php endif;?>
