<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index(){
        // Salaryモデルのallメソッドで全ての給与情報を
        // データベースから取得している
        $salaries = Salary::all();

        // view関数でテンプレートにデータを渡した結果を返す
        // 第一関数がファイル名、第二引数が渡すデータ
        return view('salaries/list', [
            'salaries' => $salaries,
        ]);
    }
}
