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

    <?= $form->field($model, 'fecha_ingreso')->widget(\yii\jui\DatePicker::className(), [
    // si estás usando bootstrap, la siguiente linea asignará correctamente el estilo del campo de entrada
    'options' => ['class' => 'form-control'],
    // ... puedes configurar más propiedades del DatePicker aquí
    ]) ?>

    <?= $form->field($model, 'estado')->dropDownList($model->getEstadoList(), [
        'prompt' => '(Seleccione)',
    ]) ?>

    <?= $form->field($model, 'academico_id')->dropDownList($model->getTipoProgramaList(), [
        'prompt' => '(Seleccione)',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
