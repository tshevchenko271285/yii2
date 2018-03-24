<?php
/**
 * Created by PhpStorm.
 * User: Timofey
 * Date: 22.03.2018
 * Time: 8:35
 */

namespace app\controllers;
use yii\base\Controller;

class AppController extends Controller {


    protected function setMeta($title = null, $keywords = null, $description = null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name'=>'keywords', 'content'=>"$keywords"]);
        $this->view->registerMetaTag(['name'=>'description', 'content'=>"$description"]);
    }

}