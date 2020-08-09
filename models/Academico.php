<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "academico".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $apepat
 * @property string|null $apemat
 * @property string|null $fecha_ingreso
 * @property int|null $estado
 */
class Academico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_ingreso'], 'safe'],
            [['estado'], 'integer'],
            [['nombre'], 'string', 'max' => 25],
            [['apepat', 'apemat'], 'string', 'max' => 35],
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
            'apepat' => 'Apellido Paterno',
            'apemat' => 'Apellido Materno',
            'fecha_ingreso' => 'Fecha Ingreso',
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
        return $this->hasMany(AcademicoPrograma::className(), ['academico_id' => 'id']);
    }


    //ESTO VA EN EL MODELO		
    public function getTipoProgramaList()
    {
        return \yii\helpers\ArrayHelper::map(Programa::find()
            ->orderBy('nombre')
            ->all(), 'id', 'nombre');
    }


}
