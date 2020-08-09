<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AcademicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Academicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Academico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'apepat',
            'apemat',
            'fecha_ingreso',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
