<h1><?=$mensaje?></h1>
<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<?= Html::beginForm(
    Url::toRoute("site/request"),//action
    "get",//method
    ["class"=>"form-inline"]//options
    );
?>

<div class="form-group">
    <?= Html::label("Introduce tu nombre","nombre")?>
    <?= Html::textInput("Introduce tu nombre","nombre",null,["class"=>"form-inline"])?>
    
</div>

<?= Html::endForm() ?>