<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Salary extends Model
{
    // Modelを継承することで
    // salariesテーブルと対応していると解釈される

    /**
     * 稼働日の日付フォーマット
     * @return string
     */
    public function getWorkingDateAttribute(){
        // キャメルケースでメソッド名を指定してスネークケースでテンプレートで表示
        return Carbon::parse($this->attributes['working_date'])->format('Y年m月d日');
    }

    /**
     * 更新日の日付フォーマット
     * @return string
     */
    public function getUpdatedAtAttribute(){
        return Carbon::parse($this->attributes['updated_at'])->format('Y年m月d日');
    }
}
