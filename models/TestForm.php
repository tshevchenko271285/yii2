<?php
namespace app\models;

use yii\db\ActiveRecord;

class TestForm extends ActiveRecord {

    public static function tableName()
    {
        return 'posts';
    }

    public function attributeLabels(){
        return [
          'name' => 'Имя',
          'email' => 'E-mail',
          'text' => 'Текст Сообщения'
        ];
    }

    public function rules(){
        return [
            [ ['name', 'text'], 'required' ],
            [ 'email', 'trim' ],
        ];
    }
}