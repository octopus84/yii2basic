<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "academico_programa".
 *
 * @property int $id
 * @property int $academico_id
 * @property int $programa_id
 *
 * @property Academico $academico
 * @property Programa $programa
 */
class AcademicoPrograma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'academico_programa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['academico_id', 'programa_id'], 'required'],
            [['academico_id', 'programa_id'], 'integer'],
            [['academico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Academico::className(), 'targetAttribute' => ['academico_id' => 'id']],
            [['programa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Programa::className(), 'targetAttribute' => ['programa_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'academico_id' => 'Academico ID',
            'programa_id' => 'Programa ID',
        ];
    }

    /**
     * Gets query for [[Academico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcademico()
    {
        return $this->hasOne(Academico::className(), ['id' => 'academico_id']);
    }

    /**
     * Gets query for [[Programa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrograma()
    {
        return $this->hasOne(Programa::className(), ['id' => 'programa_id']);
    }
}
