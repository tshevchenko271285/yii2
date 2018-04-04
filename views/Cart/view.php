<?
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<div class="container">
    <section id="cart_items">
        <div class="col-md-12">
        <?php if( !empty( $session['cart'] ) ) : ?>
        <!--<div class="container">-->
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
                <? //debug($session['cart']) ?>
                <?php foreach ( $session['cart'] as $key => $item ) : ?>
                    <?php if( !$item['name'] ) continue; ?>
                    <tr>
                        <td class="cart_product">
                            <a href="<?= Url::to(['product/view', 'id' => $key])?>">
                                <? $options = ['style' => ['width' => '150px'], 'alt' =>  $item['name'], ]; ?>
                                <?= Html::img("@web/images/product/{$item['img']}", $options); ?>
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
                                <a data-id="<?= $key ?>" class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="<?= $item['qty'] ?>" autocomplete="off" size="2">
                                <a data-id="<?= $key ?>" class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">$<?= $item['price'] * $item['qty'] ?></p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" data-id="<?= $key ?>" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td></td>
                    <td colspan="3">Итого: </td>
                    <td><?= $session['cart.qty']?></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">На сумму: </td>
                    <td>$<?= $session['cart.sum'] ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
        <hr>
        <div class="col-md-6">
            <?php $form = ActiveForm::begin();?>
                <?= $form->field($order, 'name')?>
                <?= $form->field($order, 'email')?>
                <?= $form->field($order, 'phone')?>
                <?= $form->field($order, 'address')?>
                <?= Html::submitButton('Заказать', ['class'=>'btn btn-success'])?>
            <?php ActiveForm::end();?>
        </div>
    <?php else : ?>
    <h3>Корзина пуста</h3>
    <?php endif;?>
    </section><!--/#cart_items-->
</div>