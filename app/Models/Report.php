<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['user_id','time_id', 'date', 'title', 'content']; // データベースに書き込み可能なカラムを指定

    protected $table = 'reports'; // モデルと対応するテーブル名を指定

    // 他のモデルやリレーションシップがあればここに定義
}
