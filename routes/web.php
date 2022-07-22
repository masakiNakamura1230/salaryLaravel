<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\TalentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 給与一覧画面のルート
// GET送信で/salary/{userName}/salaryListにリクエストがきたら
// SalaryControllerのindexメソッドを呼び出す
Route::get('/salary/{id}/salaryList', [SalaryController::class, 'show'])->name('salaries.list');

// タレント一覧画面のルート
Route::get('salary/talent', [TalentController::class, 'show'])->name('talents.list');

// 給与登録のルート
Route::get('/salary/salaryCreate', [SalaryController::class, 'createForm'])->name('salaries.create');

Route::post('/salary/salaryCreate', [SalaryController::class, 'create']);

// 給与編集のルート
Route::get('/salary/salaryEdit',[SalaryController::class, 'editForm'])->name('salaries.edit');

Route::post('/salary/salaryEdit/', [SalaryController::class, 'edit']);