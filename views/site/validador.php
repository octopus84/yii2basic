<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Validar Formulario 1</h1>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton("Enviar", ["class"=>"btn btn-primary"]) ?>
    </div>

<?php ActiveForm::end(); ?>