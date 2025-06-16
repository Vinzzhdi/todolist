<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class TaskSearch extends Task
{
    public function rules()
    {
        return [
            [['nama_tugas', 'deskripsi', 'deadline', 'guru_pengampu'], 'safe'],
            [['is_selesai'], 'boolean'],
        ];
    }

    public function search($params)
    {
        $query = Task::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => false, // ✅ Nonaktifkan sorting
        ]);

        // Tidak memuat parameter pencarian karena kita ingin menonaktifkan fitur filter
        // Jadi kita skip $this->load($params);

        // Namun kita tetap bisa memfilter berdasarkan user_id (diatur di controller)
        return $dataProvider;
    }
}
