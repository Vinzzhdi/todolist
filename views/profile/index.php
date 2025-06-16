<?php
use yii\helpers\Html;
?>

<style>
.profile-container {
    max-width: 900px;
    margin: 30px auto;
    padding: 30px;
    background: #fefefe;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    display: flex;
    gap: 30px;
    justify-content: space-between;
}

.profile-left {
    flex: 1;
    text-align: center;
}

.profile-left h2 {
    font-size: 26px;
    margin-bottom: 10px;
    color: #2c3e50;
}

.progress-circle {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: conic-gradient(#3498db <?= $progres ?>%, #ecf0f1 <?= $progres ?>%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    font-weight: bold;
    color: #2c3e50;
    margin: 0 auto 20px;
}

.profile-right {
    flex: 2;
}

.profile-right h3 {
    margin-bottom: 15px;
    font-size: 22px;
    color: #2980b9;
}

.tugas-box {
    max-height: 300px;
    overflow-y: auto;
    border: 1px solid #ddd;
    border-radius: 12px;
    padding: 15px;
    background: #fafafa;
}

.tugas-item {
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
}

.tugas-item:last-child {
    border-bottom: none;
}

.tugas-item h4 {
    margin: 0 0 5px;
    font-size: 18px;
    color: #34495e;
}

.tugas-item p {
    margin: 0;
    color: #555;
    font-size: 14px;
}

</style>

<div class="profile-container">
    <div class="profile-left">
        <h2>Profil Saya</h2>
        <div class="progress-circle"><?= $progres ?>%</div>
        <p style="margin-top: 10px;"><strong>Username:</strong> <?= $user->username ?></p>
    </div>

    <div class="profile-right">
        <h3>Riwayat Tugas Selesai</h3>
        <div class="tugas-box">
            <?php if (empty($tugasSelesai)): ?>
                <p>Tidak ada tugas selesai.</p>
            <?php else: ?>
                <?php foreach ($tugasSelesai as $task): ?>
                    <div class="tugas-item">
                        <h4><?= Html::encode($task->nama_tugas) ?></h4>
                        <p><strong>Guru:</strong> <?= Html::encode($task->guru_pengampu) ?></p>
                        <p><strong>Tanggal Checklist:</strong> 
                            <?= $task->checklist_at ? date('d-m-Y', strtotime($task->checklist_at)) : '-' ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
