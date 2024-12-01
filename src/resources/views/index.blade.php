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
    <form class="todo__create" action="/todos" method="post">
        @csrf
        <div class="todo__create--item">
            <input class="todo__create--item-label" type="text" name="content">
        </div>
        <div class="todo__create--button">
            <button class="todo__create--button-submit" type="submit">作成</button>
        </div>
    </form>

    <!-- リスト -->
    <div class="todo__table">
        <table class="todo__table--inner">
            <tr class="todo__table--rows">
                <th class="todo__table--header">Todo</th>
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