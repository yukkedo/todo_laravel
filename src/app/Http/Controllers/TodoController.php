<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    // Categoryモデルからデータを取得
    public function index()
    {
        $todos = Todo::with('category')->get();
        // Todoモデルのレコードとそれに紐づくcategoryテーブルのレコードを取得
        $categories = Category::all();
        // 全てのカテゴリを表示する

        return view('index', compact('todos', 'categories'));
        // viewにデータを渡す
    }

    // 追加機能
    public function store(TodoRequest $request)
    {
        $todo = $request->only(['category_id','content']);
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

    // 検索機能
    public function search(Request $request)
    {
        $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }
}
