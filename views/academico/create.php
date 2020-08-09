<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Academico */

$this->title = 'Create Academico';
$this->params['breadcrumbs'][] = ['label' => 'Academicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
