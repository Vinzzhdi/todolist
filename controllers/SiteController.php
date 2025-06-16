<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\SignupForm;

class SiteController extends Controller
{
    public function actionLogin()
    {
        $this->layout = false;

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['task/index']);
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['task/index']);
        }

        return $this->render('login', ['model' => $model]);
    }

    public function actionSignup()
    {
        $this->layout = false;

        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Berhasil daftar, silakan login.');
            return $this->redirect(['login']);
        }

        return $this->render('signup', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['login']);
    }

    public function actionIndex()
    {
        return $this->redirect(['task/index']); // Langsung ke dashboard
    }

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        return $this->render('error', ['exception' => $exception]);
    }

}
