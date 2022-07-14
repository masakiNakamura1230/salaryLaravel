<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Salary extends Model
{
    // Modelを継承することで
    // salariesテーブルと対応していると解釈される

    /**
     * 稼働日の日付フォーマット
     * @return string
     */
    // public function getWorkingDateAttribute(){
    //     // キャメルケースでメソッド名を指定してスネークケースでテンプレートで表示
    //     return Carbon::parse($this->attributes['working_date'])->format('Y年m月d日');
    // }

    /**
     * 更新日の日付フォーマット
     * @return string
     */
    // public function getUpdatedAtAttribute(){
    //     return Carbon::parse($this->attributes['updated_at'])->format('Y年m月d日');
    // }

    // 給与一覧取得
    public function getSalarySelect(int $i){
        return $salaries = DB::table('salaries as s')
        ->select([
            's.id as id',
            's.talent_id as talent_id',
            't.name as talentName',
            's.manager_id as manager_id',
            'm.name as managerName',
            's.work',
            's.salary',
        ])
        ->selectRaw('DATE_FORMAT(working_date, "%Y年%m月%d日") as working_date')
        ->selectRaw('DATE_FORMAT(updated_at, "%Y年%m月%d日") as updated_at')
        ->join('talents as t', 's.talent_id', '=', 't.id')
        ->join('managers as m', 's.manager_id', '=', 'm.id')
        ->where('s.talent_id', '=', $i)
        ->get();
    }
}
