<?php
use yii\helpers\Html;

$this->title = 'Error';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= nl2br(Html::encode($exception->getMessage())) ?></p>
</body>
</html>
