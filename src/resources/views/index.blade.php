@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__content">
    <!-- 作成 -->
    <form class="todo__create">
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
            <tr class="todo__table--rows">
                <td class="todo__table--item">
                    <form class="update-form">
                        <div class="update-form__item">
                            <input class="update-form__item-input" type="text">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="todo__table--item">
                    <form class="delete-form">
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            <tr class="todo__table--rows">
                <td class="todo__table--item">
                    <form class="update-form">
                        <div class="update-form__item">
                            <input class="update-form__item-input" type="text">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="todo__table--item">
                    <form class="delete-form">
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection