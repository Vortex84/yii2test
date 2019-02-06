<?php
namespace frontend\controllers;

use common\models\Delivery;
use common\models\Parcels;
use Yii;
use yii\web\Controller;

class ParcelController extends Controller
{

    public function actionIndex()
    {
        $parcels = Parcels::find()->all();

        return $this->render('parcels', [
            'parcels' => $parcels,
        ]);
    }

    public function actionShow($id)
    {
        $parcel = Parcels::findOne($id);

        return $this->render('parcel', [
            'parcel' => $parcel,
            'delivery' => Delivery::find()->all(),
        ]);
    }

    public function actionCreate()
    {
        $parcel = new Parcels();

        if ($parcel->load(Yii::$app->request->post()) && $parcel->validate()) {
            $data = Yii::$app->request->post()['Parcels'];

            $parcel->name = $data['name'];
            $parcel->weight = $data['weight'];
            $parcel->delivery_id = $data['delivery_id'];
            $parcel->status = $data['status'];
            $parcel->save();

            return $this->redirect(['parcel/' . $parcel->id]);
        }

        return $this->render('create', [
            'parcel' => $parcel,
            'delivery' => Delivery::find()->all(),
        ]);
    }

    public function actionUpdate($id)
    {
        $parcel = Parcels::findById($id, true);

        if ($parcel->load(Yii::$app->request->post()) && $parcel->validate()) {
            $data = Yii::$app->request->post()['Parcels'];

            $parcel->name = $data['name'];
            $parcel->weight = $data['weight'];
            $parcel->delivery_id = $data['delivery_id'];
            $parcel->status = $data['status'];
            $parcel->save();

            return $this->redirect(['/parcel/' . $id]);
        }

        return $this->render('update', [
            'parcel' => $parcel,
            'delivery' => Delivery::find()->all(),
        ]);
    }

    public function actionDelete($id)
    {
        Parcels::findById($id, true)->delete();

        return $this->redirect(['index']);
    }
}
