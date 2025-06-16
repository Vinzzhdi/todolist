<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'unique', 'targetClass' => User::class, 'message' => 'Username sudah dipakai.'],
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->password = $this->password; // tidak di-hash sesuai permintaan

        return $user->save();
    }
}
