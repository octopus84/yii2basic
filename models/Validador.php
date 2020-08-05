<?php

namespace app\models;

use yii\base\Model;

class Validador extends Model{
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