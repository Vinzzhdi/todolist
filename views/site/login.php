<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= Html::encode($this->title) ?></title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background: linear-gradient(135deg, #4b6cb7, #182848);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 15px;
            width: 400px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            font-size: 16px;
            transition: background 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .link a {
            color: #007bff;
            text-decoration: none;
        }
        .link a:hover {
            text-decoration: underline;
        }
        input.form-control {
            height: 45px;
            border-radius: 8px;
            padding: 10px;
            border: 1px solid #ccc;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Login</h1>
        <?php $form = ActiveForm::begin(); ?>
            <div class="form-group">
                <?= Html::label('Username', 'username') ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Masukkan Username'])->label(false) ?>
            </div>
            <div class="form-group">
                <?= Html::label('Password', 'password') ?>
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Masukkan Password'])->label(false) ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
        <div class="link">
            Belum punya akun? <?= Html::a('Daftar di sini', ['site/signup']) ?>
        </div>
    </div>
</body>
</html>