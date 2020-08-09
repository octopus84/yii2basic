<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProgramaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Programa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'descripcion',
            'fecha_registro',
            'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php
    use yii\helpers\ArrayHelper;
    use app\models\Programa;
    ?>
    <?= $form->field($model, 'id')->dropDownList(ArrayHelper::map(Programa::find()->asArray()->all(), 'id', 'nombre')
                )
    ?>
</div>
