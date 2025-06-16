<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Task;

class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
{
    $user = Yii::$app->user->identity;

    $tugasSelesai = Task::find()
        ->where(['user_id' => $user->id, 'is_selesai' => 1])
        ->orderBy(['checklist_at' => SORT_DESC])
        ->all();

    $totalTugas = Task::find()->where(['user_id' => $user->id])->count();
    $tugasSelesaiCount = count($tugasSelesai);
    $progres = $totalTugas > 0 ? round(($tugasSelesaiCount / $totalTugas) * 100) : 0;

    return $this->render('index', [
        'user' => $user,
        'tugasSelesai' => $tugasSelesai,
        'progres' => $progres, // ✅ KIRIM VARIABEL INI
    ]);
}




}
