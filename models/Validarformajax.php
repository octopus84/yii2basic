<?php

namespace app\models;

use yii\base\Model;

class Validarformajax extends Model{
    public $nombre;
    public $email;

  public function rules()
    {
        return [
            ['nombre', 'required', 'message' => 'Campo requerido'],
            ['nombre', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 caracteres'],
            ['nombre', 'match', 'pattern' => "/^[a-z]+$/i", 'message' => 'Sólo se aceptan letras'],
            // ['nombre', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y números'],
            ['email', 'required', 'message' => 'Campo requerido'],
            ['email', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Mínimo 5 y máximo 80 caracteres'],
            ['email', 'email', 'message' => 'Formato no válido'],
            ['email', 'existe_email'],
        ];
    }

    public function attributeLabels()
    {
        return[
            "nombre"=>"Nombre: ",
            "email"=>"Email: ",
        ];
    }
    public function existe_email($attribute){
        $email=["octavio@gmail.com","octopus@gmail.com"];
        foreach ($email as $value) {
            if ($this->email == $value ) {
                $this->addError($attribute, "El email seleccionado existe.");
                return true;
            }else {
                return false;
            }
        }
    }
}