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