<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $parcel \frontend\models\Parcels */
/* @var $form yii\widgets\ActiveForm */
/* @var $delivery yii\db\ActiveRecord[] */
?>

<div class="parcel-form">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['action' => $parcel->isNewRecord ? '/parcel/create' : '/parcel/update/' . $parcel->id]);?>

            <?= $form->field($parcel, 'name')->textInput(['maxlength' => 255]) ?>
            <?= $form->field($parcel, 'weight')->textInput(['maxlength' => 12]) ?>

            <?= $form->field($parcel, 'delivery_id')->dropDownList(
                ArrayHelper::map($delivery, 'id', 'name')
            ) ?>
            <?= $form->field($parcel, 'status')->dropDownList(
                ArrayHelper::map([['id' => '0', 'name' => 'Неактивная'], ['id' => '1', 'name' => 'Активная'], ], 'id', 'name')
            ) ?>

            <div class="form-group">
                <?= Html::submitButton(
                    'Сохранить',
                    ['class' => $parcel->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
                )
                ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
