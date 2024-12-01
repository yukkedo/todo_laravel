<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    // 追加機能
    public function store(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        // データの抽出
        Todo::create($todo);
        // Todoモデルを使ってデータベースにデータを作成
        return redirect('/')->with('message','Todoを作成しました');
    }

    // 更新機能
    public function update(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        // データの抽出
        Todo::find($request->id)->update($todo);
        // Todoモデルを使ってデータベースの特定のIDを検索してその値を更新する
        return redirect('/')->with('message', 'Todoを更新しました');
    }

    // 削除機能
    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();
        // Todoモデルを使ってデータベースの特定のIDを検索してその値を削除する
        return redirect('/')->with('message', 'Todoを削除しました');
    }
}
