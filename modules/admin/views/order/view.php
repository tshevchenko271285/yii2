<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Просмотр заказа № <?= Html::encode($model->id) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
           // 'status',
            [
                'attribute' => 'status',
                'value' => !$model->status ? '<span class="text-danger">Активен</span>' : '<span class="text-success">Завершен</span>',
                'format' => 'html',
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

    <?php $items = $model->orderItems ?>
    <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
            <tr class="cart_menu">
                <!--<td class="image">Фото</td>-->
                <td class="description"></td>
                <td class="price">Цена</td>
                <td class="quantity">Количество</td>
                <!--<td class="total">Всего</td>-->
                <td>Сумма</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ( $items as $item ) : ?>
                <?php if( !$item['name'] ) continue; ?>
                <tr>
                    <td class="cart_description">
                        <h4><a href="<?= Url::to([ '/product/view', 'id' => $item['product_id'] ])?>"><?= $item['name'] ?></a></h4>
                    </td>
                    <td class="cart_price">
                        <p>$<?= $item['price'] ?></p>
                    </td>
                    <td class="cart_quantity">
                        <?= $item['qty_item'] ?>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">$<?= $item['sum_item'] ?></p>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
