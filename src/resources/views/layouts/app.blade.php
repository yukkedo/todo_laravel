<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header-title">
            <div class="header__logo">
                <a class="header__logo--top" href="/">
                    Todo
                </a>
                <nav>
                    <ul class="header__nav">
                        <li class="header__nav--item">
                            <a class="header__nav--link" href="">
                                カテゴリ一覧
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>