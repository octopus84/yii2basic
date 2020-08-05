<?php
use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>Nombre</label>: <?= Html::encode($model->nombre) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>