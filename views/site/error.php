<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
</div>
<div class="container text-center">
    <div class="logo-404">
        <?= Html::img('@web/images/home/logo.png', ['alt'=>'Logo'])?>
    </div>
    <div class="content-404">
        <?= Html::img('@web/images/404/404.png', ['alt'=>'Ошибка 404'])?>
        <p><?= nl2br(Html::encode($message)) ?></p>
        <h2><a href="<?= Url::home() ?>">Bring me back Home</a></h2>
        <br><br><br>
    </div>
</div>