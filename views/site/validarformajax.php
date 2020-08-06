<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Validar Formulario Ajax</h1>
<h3><?=$msg?></h3>
<?php $form = ActiveForm::begin(
    /*
    "method"=>"post",
    "id"=>"formulario",
    "enableClientValidation" => false,
    "enableAjaxValidation" => true,
    ]*/
    );?>

    <?= $form->field($model, 'nombre')->input("text")?>

    <?= $form->field($model, 'email')->input("email")?>

    <div class="form-group">
        <?= Html::submitButton("Enviar", ["class"=>"btn btn-primary"]) ?>
    </div>

<?php ActiveForm::end(); ?>