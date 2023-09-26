<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['content']; // データベースに書き込み可能なカラムを指定

    protected $table = 'reports'; // モデルと対応するテーブル名を指定

    // 他のモデルやリレーションシップがあればここに定義
}
