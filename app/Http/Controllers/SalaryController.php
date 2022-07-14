<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Talent;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function show(int $id){
        // Salaryモデルのallメソッドで全ての給与情報をデータベースから取得している
        // $salaries = Salary::all();

        // findメソッドでプライマリキーの絡む条件として1行分取得
        // 今回はタレントテーブルからIDカラムが$idである行取得(Routeの{}で指定した値)
        // $talent = Talent::find($id);

        // 給与テーブルのtalent_idと一致するデータのみ取得
        // $salaries = Salary::where('talent_id', $talent->id)->get();
        // $salaries = $talent->salaries()->get();

        // $salaries = Salary::select([
        //     't.name as talentName',
        //     'm.name as managerName',
        //     's.work',
        //     's.working_date',
        //     's.updated_at',
        //     's.salary',
        // ])
        // ->from('salaries as s')
        // ->join('talents as t',function($join){
        //     $join->on('s.talent_id', '=', 't.id');
        // })
        // ->join('managers as m', function($join){
        //     $join->on('s.manager_id', '=', 'm.id');
        // })
        // ->where('s.talent_id', '=', $talent->id)
        // ->get();

        // 給与一覧取得
        $salaries = Salary::getSalarySelect($id);
        

        // view関数でテンプレートにデータを渡した結果を返す
        // 第一関数がファイル名、第二引数が渡すデータ
        return view('salaries/list', [
            'salaries' => $salaries,
            // 'talent' => $talent,
        ]);
    }

    // public function createForm(){
    //     return view('salaries/create', [

    //     ]);
    // }
    
    // public function create(){

    // }
}
