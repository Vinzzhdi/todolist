<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Daftar Tugas';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
body {
    background: #e9f1f7;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
}

.task-index {
    max-width: 1000px;
    margin: 40px auto;
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.btn-tambah {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    float: right;
    margin-bottom: 15px;
    transition: background 0.3s;
}

.btn-tambah:hover {
    background-color: #2980b9;
}

.table-container {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

th, td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #2980b9;
    color: white;
}

tr:hover {
    background-color: #f0f0f0;
}

.badge {
    padding: 5px 12px;
    border-radius: 20px;
    color: white;
    font-size: 12px;
}

.badge-selesai {
    background-color: #27ae60;
}

.badge-belum {
    background-color: #c0392b;
}

.icon-btn {
    margin: 0 5px;
    text-decoration: none;
    font-size: 18px;
}

footer {
    text-align: center;
    margin-top: 60px;
    color: #888;
}
</style>

<div class="task-index">
    <a href="<?= Url::to(['task/create']) ?>" class="btn-tambah">+ Tambah Tugas</a>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tugas</th>
                    <th>Deskripsi</th>
                    <th>Deadline</th>
                    <th>Guru Pengampu</th>
                    <th>Status</th>
                    <th>Checklist</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $index => $task): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= Html::encode($task->nama_tugas) ?></td>
                        <td><?= Html::encode($task->deskripsi) ?></td>
                        <td><?= Yii::$app->formatter->asDate($task->deadline, 'php:d M Y') ?></td>
                        <td><?= Html::encode($task->guru_pengampu) ?></td>
                        <td>
                            <?php if ($task->is_selesai): ?>
                                <span class="badge badge-selesai">Selesai</span>
                            <?php else: ?>
                                <span class="badge badge-belum">Belum</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (!$task->is_selesai): ?>
                                <?= Html::a('✅', ['task/checklist', 'id' => $task->id], [
                                    'title' => 'Selesaikan tugas ini',
                                    'data-method' => 'post',
                                    'class' => 'icon-btn',
                                ]) ?>
                            <?php else: ?>
                                ✅
                            <?php endif; ?>
                        </td>
                        <td>
                            <?= Html::a('✏️', ['task/update', 'id' => $task->id], ['class' => 'icon-btn', 'title' => 'Edit']) ?>
                            <?= Html::a('🗑️', ['task/delete', 'id' => $task->id], [
                                'data' => [
                                    'confirm' => 'Yakin ingin menghapus tugas ini?',
                                    'method' => 'post',
                                ],
                                'class' => 'icon-btn',
                                'title' => 'Hapus',
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($tasks)): ?>
                    <tr>
                        <td colspan="8">Tidak ada tugas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>