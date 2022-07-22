<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Talent;
use App\Models\Manager;
use App\Http\Requests\CreateSalary;
use App\Http\Requests\EditSalary;
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

        // タレント一覧で選択されたIDをセッションに格納
        session()->put('talentId', $id);

        // 給与一覧取得
        $salaries = Salary::getSalarySelect($id);
        

        // view関数でテンプレートにデータを渡した結果を返す
        // 第一関数がファイル名、第二引数が渡すデータ
        return view('salaries/list', [
            'salaries' => $salaries,
            // 'talent' => $talent,
        ]);
    }

    /**
     * 給与登録フォーム
     */
    public function createForm(){

        $talentId = session() ->get('talentId');

        $talent = Talent::find($talentId);

        $managers = Manager::all();

        return view('salaries/create', [
            'talent' => $talent,
            'managers' => $managers,

        ]);
    }
    
    /**
     * 給与登録
     */
    public function create(CreateSalary $request){

        // $workingDateYear = $request->workingDateYear;
        // $workingDateMonth = str_pad($request->workingDateMonth, 2, '0', STR_PAD_LEFT);
        // $workingDateDay = str_pad($request->workingDateDay, 2, '0', STR_PAD_LEFT);

        // $workingDate = $workingDateYear. $workingDateMonth. $workingDateDay;

        $salary = new Salary();

        $salary->talent_id = $request->talent_id;
        $salary->manager_id = $request->manager_id;
        $salary->work = $request->work;
        $salary->working_date = $request->workingDate;
        $salary->salary = $request->salary;

        $salary->save();

        return redirect()->route('salaries.list', [
            'id' => $salary->talent_id,
        ]);
    }

    /**
     * 給与編集フォーム
     */
    public function editForm(Request $request){

        $salary = Salary::find($request->id);
        $managers = Manager::all();
        $talent = Talent::find($salary->talent_id);

        return view('salaries.edit',[
            
            'salary' => $salary,
            'talent' => $talent,
            'managers' => $managers,

        ]);
    }

    /**
     * 給与編集
     */
    public function edit(EditSalary $request){
        
        // $workingDateYear = $request->workingDateYear;
        // $workingDateMonth = str_pad($request->workingDateMonth, 2, '0', STR_PAD_LEFT);
        // $workingDateDay = str_pad($request->workingDateDay, 2, '0', STR_PAD_LEFT);

        // $workingDate = $workingDateYear. $workingDateMonth. $workingDateDay;

        $salary = Salary::find($request->id);
        
        $salary->talent_id = $request->talent_id;
        $salary->manager_id = $request->manager_id;
        $salary->work = $request->work;
        $salary->working_date = $request->workingDate;
        $salary->salary = $request->salary;
        $salary->save();

        return redirect()->route('salaries.list', [
            'id' => $salary->talent_id,
        ]);

    }
}
