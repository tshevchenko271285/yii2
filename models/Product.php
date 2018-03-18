<?php
namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord {

    public static function tableName(){
        return 'products';
    }
    public function getCategories(){
        //определение связи один ко многим
        return $this->hasMany(Category::className(), ['id' => 'parent']);
    }
}

$sql = 'CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8';