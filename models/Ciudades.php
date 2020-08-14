<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciudades".
 *
 * @property int $id
 * @property string $paises_iso
 * @property string $ciudad
 *
 * @property PaisesCiudades[] $paisesCiudades
 */
class Ciudades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ciudades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paises_iso', 'ciudad'], 'required'],
            [['paises_iso'], 'string', 'max' => 2],
            [['ciudad'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paises_iso' => 'Paises Iso',
            'ciudad' => 'Ciudad',
        ];
    }

    /**
     * Gets query for [[PaisesCiudades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaisesCiudades()
    {
        return $this->hasMany(PaisesCiudades::className(), ['ciudades_id' => 'id']);
    }
}
