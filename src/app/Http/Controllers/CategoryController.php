<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    // カテゴリーの追加
    public function store(CategoryRequest $request)
    {
        $category = $request->only(['name']);
        Category::create($category);

        return redirect('/categories')->with('message', 'カテゴリを作成しました');
    }

    // 更新機能
    public function update(CategoryRequest $request)
    {
        $category = $request->only(['name']);
        // データの抽出
        Category::find($request->id)->update($category);
        // Todoモデルを使ってデータベースの特定のIDを検索してその値を更新する
        return redirect('/categories')->with('message', 'カテゴリを更新しました');
    }

    // 削除機能
    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();

        return redirect('/categories')->with('message', 'カテゴリを削除しました');
    }
}
