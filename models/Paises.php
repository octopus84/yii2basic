<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paises".
 *
 * @property int $id
 * @property string|null $iso
 * @property string|null $nombre
 */
class Paises extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paises';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iso'], 'string', 'max' => 2],
            [['nombre'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iso' => 'Iso',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[AcademicoProgramas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaises_Ciudades()
    {
        return $this->hasMany(PaisesCiudades::className(), ['paises_id' => 'id']);
    }

    //ESTO VA EN EL MODELO		
    public function getTipoCiudadesList()
    {
        return \yii\helpers\ArrayHelper::map(Ciudades::find()
            ->orderBy('ciudad')
            ->all(), 'paises_iso', 'ciudad');
    }
}
