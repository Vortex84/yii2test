<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

class Parcels extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public function rules()
    {
        return [
            [['name', 'weight', 'delivery_id', 'status'], 'required'],
            [ ['weight'], 'double'],
            ['delivery_id', 'integer'],
            ['status', 'in', 'range' => [0,1]],
        ];
    }

    public function getDelivery()
    {
        return $this->hasOne(Delivery::className(), ['id' => 'delivery_id']);
    }

    /**
     * @throws NotFoundHttpException
     */
    public static function findById($id, $ignoreStatus = false)
    {
        if (($model = Parcels::findOne($id)) !== null) {
            if ($model->isActive() || $ignoreStatus) {
                return $model;
            }
        }

        throw new NotFoundHttpException('Посылка не существует.');
    }

    protected function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function getTextStatus()
    {
        return $this->status ? 'Активная' : 'Неактивная';
    }
}
