<?php 
namespace app\models;

use yii\base\Model;

class ExampleTestForm extends Model {

	public $name;
	public $email;
	public $text;

	public function attributeLabels(){
		return [
			'name' => 'Имя',
			'email' => 'E-mail',
			'text' => 'Текст сообщения'
		];
	}

	public function rules() {
		return [
			// Правила валидации
			//[ ['name', 'email'], 'required', 'message' => 'Текст сообщения' ],

			// К перечисленным полям применяется правило "Обязательны к заполнению"
			[ ['name', 'email'], 'required' ],

			// Указанное поле проверяется выбранным валидатором
			[ 'email', 'email' ],

			// Указанное поле проверяется на длину строки length может быть 2 или [2, 4]
			//[ 'name', 'string', 'length' => [2, 2], 'tooShort' => 'Минимальное колличество 2 символа', 'tooLong' => 'Максимальная длина сообщения 2 символа' ],
			[ 'name', 'string', 'min' => 2, 'tooShort' => 'Минимальное колличество 2 символа' ],
			[ 'name', 'string', 'max' => 3, 'tooLong' => 'Максимальная длина Вашего имени 2 символа' ],

			// Обрезает пробелы
			['text', 'trim'],

			// Определение собственного валидатора вторым параметром указываем имя метода(не работает на клиенте, )
			['name', 'myRule'],
		];
	}
	// Определение собственного валидатора
	public function myRule($attr){
		if( !in_array( $this->$attr, ['qwe', 'qw'] ) ) {
			$this->addError($attr, 'Wrong!');
		}
	}

}
