<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }

    public function login()
    {
        $user = User::findByUsername($this->username);
        if ($user && $user->validatePassword($this->password)) {
            return Yii::$app->user->login($user);
        }

        $this->addError('password', 'Username atau password salah.');
        return false;
    }
}
