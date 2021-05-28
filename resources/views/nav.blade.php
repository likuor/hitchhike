<nav class="navbar navbar-expand navbar-light" style="background-color: #e3f2fd;">

    <a class="navbar-brand" href="/"><i class="far fa-sticky-note mr-1"></i>hitchhike</a>

    <ul class="navbar-nav ml-auto">
        <li>
            <div class="container-fluid">
                <form class="d-flex input-group w-auto" action="/">
                    <input type="keyword" class="form-control" placeholder="都道府県・都市名" aria-label="Search" name="keyword" value="{{ request('keyword') }}"/>
                    <button class="btn btn-outline-primary btn-sm" type="submit" data-mdb-ripple-color="dark">
                        検索
                    </button>
                </form>
            </div>
        </li>

    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
        </li>
    @endguest

    @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('spots.create') }}"><i class="fas fa-pen mr-1"></i>投稿</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <button class="dropdown-item" type="button"
                    onclick="location.href='{{ route('users.show', ['name' => Auth::user()->name]) }}'">
                マイページ
            </button>
            <div class="dropdown-divider"></div>
            <button form="logout-button" class="dropdown-item" type="submit">
                ログアウト
            </button>
        </div>
        </li>
        <form id="logout-button" method="POST" action=" {{ route('logout') }} ">
            @csrf
        </form>
        <!-- Dropdown -->
    @endauth

    </ul>

</nav>
