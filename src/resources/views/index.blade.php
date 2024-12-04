@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alertr">
    @if(session('message'))
    <div class="todo__alert--success">
        {{ session('message') }}
    </div>
    @endif
    @if($errors->any())
    <div class="todo__alert--danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="todo__content">
    <!-- 作成 -->
    <div class="todo__title">
        <h2>新規作成</h2>
    </div>
    <form class="todo__create" action="/todos" method="post">
        @csrf

        <div class="todo__create--item">
            <input class="todo__create--item-label" type="text" name="content" value="{{ old('content') }}">
        </div>
        <div class="todo__create--select">
            <select class="todo__create--select-label" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="todo__create--button">
            <button class="todo__create--button-submit" type="submit">作成</button>
        </div>
    </form>

    <!-- 検索 -->
    <div class="todo__title">
        <h2>Todo検索</h2>
    </div>
    <form class="todo__search" action="/todos/search" method="get">
        @csrf

        <div class="todo__search--item">
            <input class="todo__create--item-label" type="text" name="keyword" value="{{ old('keyword') }}">
        </div>
        <div class="todo__search--select">
            <select class="todo__search--select-label" name="category_id">
                <option value="">カテゴリ</option>
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="todo__search--button">
            <button class="todo__create--button-submit" type="submit">検索</button>
        </div>
    </form>

    <!-- リスト -->
    <div class="todo__table">
        <table class="todo__table--inner">
            <tr class="todo__table--rows">
                <th>
                    <span class="todo__table--header-span">Todo</span>
                    <span class="todo__table--header">カテゴリ</span>
                </th>
            </tr>
            @foreach($todos as $todo)
            <tr class="todo__table--rows">
                <td class="todo__table--item">
                    <form class="update-form" action="/todos/update" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="update-form__item">
                            <input class="update-form__item-input" type="text" name="content" value="{{ $todo['content'] }}">
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                        </div>
                        <div class="update-form__item">
                            <p class="update-form__item-p">{{ $todo['category']['name'] }}
                            </p>
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="todo__table--item">
                    <form class="delete-form" action="/todos/delete" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="delete-form__button">
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection