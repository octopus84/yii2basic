<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programa".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property string|null $fecha_registro
 * @property int|null $estado
 */
class Programa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_registro'], 'safe'],
            [['estado'], 'integer'],
            [['nombre'], 'string', 'max' => 25],
            [['descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'fecha_registro' => 'Fecha Registro',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[AcademicoProgramas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicoProgramas()
    {
        return $this->hasMany(AcademicoPrograma::className(), ['programa_id' => 'id']);
    }    
}
