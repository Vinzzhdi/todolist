<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<style>
    .form-container {
        background: #ffffff;
        padding: 40px;
        border-radius: 16px;
        max-width: 700px;
        margin: 0 auto;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    label {
        font-weight: bold;
        color: #2c3e50;
    }
    input[type="text"],
    textarea,
    select,
    input[type="date"] {
        width: 100%;
        padding: 10px 14px;
        border-radius: 6px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 15px;
        margin-top: 6px;
    }
    textarea {
        resize: vertical;
        min-height: 100px;
    }
    .btn-submit {
        background-color: #3498db;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        border: none;
        font-weight: bold;
        cursor: pointer;
        margin-top: 20px;
    }
    .btn-submit:hover {
        background-color: #2980b9;
    }
</style>

<div class="form-container">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nama_tugas')->textInput([
            'maxlength' => true,
            'placeholder' => 'Masukkan nama tugas...',
        ]) ?>

        <?= $form->field($model, 'deskripsi')->textarea([
            'maxlength' => 200,
            'rows' => 4,
            'placeholder' => 'Deskripsi maksimal 200 karakter...',
        ]) ?>

        <?= $form->field($model, 'deadline')->input('date', [
            'min' => date('Y-m-d'), // ⛔ tidak bisa pilih tanggal sebelum hari ini
        ]) ?>

        <?= $form->field($model, 'guru_pengampu')->dropDownList([
            'Bu Reny' => 'Bu Reny',
            'Pak Haris' => 'Pak Haris',
            'Pak Rusdi' => 'Pak Rusdi',
            'Bu Rosy' => 'Bu Rosy',
            'Bu Dinda' => 'Bu Dinda',
             'Pak Rizqi' => 'Pak Rizqi',
        ], ['prompt' => 'Pilih Guru']) ?>
        
        <div class="form-group" style="text-align: center;">
            <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Perbarui', ['class' => 'btn-submit']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
