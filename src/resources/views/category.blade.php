@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
<div class="category__alertr">
    @if(session('message'))
    <div class="category__alert--success">
        {{ session('message') }}
    </div>
    @endif
    @if($errors->any())
    <div class="category__alert--danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="category__content">
    <!-- 作成 -->
    <form class="category__create" action="/categories" method="post">
        @csrf

        <div class="category__create--item">
            <input class="category__create--item-label" type="text" name="name" value="{{ old('name') }}">
        </div>
        <div class="category__create--button">
            <button class="category__create--button-submit" type="submit">作成</button>
        </div>
    </form>

    <!-- リスト -->
    <div class="category__table">
        <table class="category__table--inner">
            <tr class="category__table--rows">
                <th class="category__table--header">category</th>
            </tr>
            @foreach($categories as $category)
            <tr class="category__table--rows">
                <td class="category__table--item">
                    <form class="update-form" action="/categories/update" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="update-form__item">
                            <input class="update-form__item-input" type="text" name="name" value="{{ $category['name'] }}">
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="category__table--item">
                    <form class="delete-form" action="/categories/delete" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="delete-form__button">
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
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