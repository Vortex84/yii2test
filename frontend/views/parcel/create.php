<?php

/* @var $this yii\web\View */
/* @var $parcel \common\models\Parcels */
/* @var $delivery \common\models\Delivery */

use yii\helpers\Html;

$this->title = 'Добавление посылки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parcel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('form', [
        'parcel' => $parcel,
        'delivery' => $delivery,
    ]) ?>

</div>
