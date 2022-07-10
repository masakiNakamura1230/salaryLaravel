<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Talent;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index(int $id){
        // Salaryモデルのallメソッドで全ての給与情報をデータベースから取得している
        // $salaries = Salary::all();

        // プライマリキーの絡む条件として1行分取得
        // 今回はタレントテーブルからIDカラムが$idである行取得(Routeの{}で指定した値)
        $talent = Talent::find($id);

        // 給与テーブルのtalent_idと一致するデータのみ取得
        $salaries = Salary::where('talent_id', $talent->id)->get();

        // view関数でテンプレートにデータを渡した結果を返す
        // 第一関数がファイル名、第二引数が渡すデータ
        return view('salaries/list', [
            'salaries' => $salaries,
            'talent' => $talent,
        ]);
    }
}
