<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Task;
use yii\web\NotFoundHttpException;

class TaskController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'create', 'update', 'delete', 'checklist'],
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
        $tasks = Task::find()
            ->where(['user_id' => Yii::$app->user->id, 'is_selesai' => 0])
            ->orderBy(['deadline' => SORT_ASC])
            ->all();

        return $this->render('index', [
            'tasks' => $tasks,
        ]);
    }

    public function actionCreate()
    {
        $model = new Task();
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->id;
            $model->is_selesai = 0;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Tugas berhasil ditambahkan!');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Task::findOne($id);
        if (!$model || $model->user_id != Yii::$app->user->id) {
            throw new NotFoundHttpException('Tugas tidak ditemukan.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Tugas berhasil diperbarui.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = Task::findOne($id);
        if ($model && $model->user_id == Yii::$app->user->id) {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Tugas berhasil dihapus.');
        }

        return $this->redirect(['index']);
    }

    public function actionChecklist($id)
{
    $task = Task::findOne($id);
    if ($task && $task->user_id == Yii::$app->user->id) {
        $task->is_selesai = 1;
        $task->checklist_at = date('Y-m-d H:i:s');
        if ($task->save()) {
            Yii::$app->session->setFlash('success', 'Tugas berhasil dichecklist!');
        }
    }
    return $this->redirect(['index']);
}

}

