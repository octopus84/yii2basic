<?php

namespace app\models;

use yii\base\Model;

class ValidadorForm extends Model{
    public $nombre;
    public $email;

    public function rules()
    {
        return [
            [['nombre', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}