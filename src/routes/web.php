<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;

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

// Todo作成画面表示
Route::get('/', [TodoController::class, 'index']);
// 追加機能
Route::post('/todos', [TodoController::class, 'store']);
// 更新機能
Route::patch('/todos/{todo_id}', [TodoController::class, 'update']);
// 削除機能
Route::delete('/todos/{todo_id}', [TodoController::class, 'destroy']);
// 検索機能
Route::get('/todos/search', [TodoController::class, 'search']);



// /localhos/categories
// カテゴリ一覧表示
Route::get('/categories', [CategoryController::class,'index']);
// 追加機能
Route::post('/categories', [CategoryController::class, 'store']);
// 更新機能
Route::patch('/categories/{category_id}', [CategoryController::class, 'update']);
// 削除機能
Route::delete('/categories/{category_id}', [CategoryController::class, 'destroy']);