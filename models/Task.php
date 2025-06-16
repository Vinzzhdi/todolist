<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property int $user_id
 * @property string $nama_tugas
 * @property string|null $deskripsi
 * @property string $deadline
 * @property string $guru_pengampu
 * @property int $is_selesai
 * @property string|null $checklist_at
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'nama_tugas', 'deadline', 'guru_pengampu'], 'required'],
            [['user_id', 'is_selesai'], 'integer'],
            [['deskripsi'], 'string', 'max' => 200],
            [['deadline', 'checklist_at'], 'safe'],
            [['nama_tugas', 'guru_pengampu'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'nama_tugas' => 'Nama Tugas',
            'deskripsi' => 'Deskripsi',
            'deadline' => 'Deadline',
            'guru_pengampu' => 'Guru Pengampu',
            'is_selesai' => 'Selesai',
            'checklist_at' => 'Tanggal Checklist',
        ];
    }

    /**
     * Relasi ke model User (jika kamu punya relasi)
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
