<?php

/* @var $this yii\web\View */
/* @var $parcel \common\models\Parcels */

use yii\helpers\Html;

$this->title = 'Посылка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-parcels">
    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table table-striped table-hover table-bordered">
        <thead>
            <td>ID</td>
            <td>Посылка</td>
            <td>Вес</td>
            <td>Доставка</td>
            <td>Цена</td>
            <td>Статус</td>
        </thead>
        <tr>
            <td><?= $parcel->id ?></td>
            <td><?= $parcel->name ?></td>
            <td><?= $parcel->weight ?></td>
            <td><?= $parcel->delivery->name; ?></td>
            <td><?= $parcel->delivery->price; ?></td>
            <td><?= $parcel->getTextStatus() ?></td>
        </tr>
    </table>
    <?= Html::a('Редактировать', ['update', 'id' => $parcel->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Создать', ['create'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Удалить', ['delete', 'id' => $parcel->id], ['class' => 'btn btn-primary']) ?>
</div>
