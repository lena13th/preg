<?php
/**
 * Created by PhpStorm.
 * User: Lena
 * Date: 18.12.2017
 * Time: 16:27
 */
namespace app\models;
use yii\base\Model;

class SignupForm extends Model{

    public $username;
    public $password;

    public function rules() {
        return [
            [['username', 'password'], 'required', 'message' => 'Заполните поле'],
            ['username', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
        ];
    }

}