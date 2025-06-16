<?php
use yii\helpers\Html;

$this->title = 'Tambah Tugas';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= Html::encode($this->title) ?></title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #dfe9f3, #ffffff);
            margin: 0;
            padding: 30px;
        }
        .form-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            max-width: 700px;
            margin: 0 auto;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 26px;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #34495e;
            font-weight: bold;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1><?= Html::encode($this->title) ?></h1>

        <!-- Render form, tapi is_selesai tidak muncul -->
        <?= $this->render('_form', ['model' => $model]) ?>

        <div style="text-align: center;">
            <?= Html::a('← Kembali ke Daftar Tugas', ['index'], ['class' => 'back-link']) ?>
        </div>
    </div>
</body>
</html>
