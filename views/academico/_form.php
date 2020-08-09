<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Academico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apepat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apemat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_ingreso')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'academico_programa_id')->dropDownList($model->getTipoProgramaList(), [
        'prompt' => '(Seleccione)',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
