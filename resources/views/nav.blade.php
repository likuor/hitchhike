<header>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="navbar-brand" aria-current="page" href="/"><i class="far fa-sticky-note mr-1"></i>hitchhike</a>
                </li>
                <li class="nav-item">
                    <form class="d-flex input-group w-auto" action="/">
                        <input type="keyword" class="form-control" placeholder="都道府県・都市名" aria-label="Search" name="keyword" value="{{ request('keyword') }}"/>
                        <button class="btn btn-outline-primary btn-sm" type="submit" data-mdb-ripple-color="dark">
                            検索
                        </button>
                    </form>
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

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ Storage::url(Auth::user()->image_profile) }}" width="32px" alt="">
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
                @endauth
            </ul>
        </div>
    </div>
</nav>
</header>

<!-- <nav class="navbar navbar-expand navbar-light" style="background-color: #e3f2fd;">

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

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img src="{{ Storage::url(Auth::user()->image_profile) }}" width="32px" alt="">
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
    @endauth

    </ul>

</nav> -->
