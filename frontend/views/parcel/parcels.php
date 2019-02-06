<?php

/* @var $this yii\web\View */
/* @var $parcel \common\models\Parcels */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Список посылок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-services">
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
        <?foreach($parcels as $parcel):?>
        <tr>
            <td><?= $parcel['id'] ?></td>
            <td><a href="<?= Url::to(['parcel/' . $parcel->id])?>"><?= $parcel->name ?></a></td>
            <td><?= $parcel->weight ?></td>
            <td><?= $parcel->delivery->name ?></td>
            <td><?= $parcel->delivery->price ?></td>
            <td><?= $parcel->getTextStatus() ?></td>
        </tr>
        <?endforeach;?>
    </table>
</div>
