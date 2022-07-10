<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaryController;

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
Route::get('/salary/{id}/salaryList', [SalaryController::class, 'index']);


