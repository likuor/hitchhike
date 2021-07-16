<header>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
    <div class="container-fluid justify-content-between">
        <!-- Left elements -->
        <div class="d-flex">
            <!-- Brand -->
            <a class="navbar-brand me-2 mb-1 d-flex align-items-center" aria-current="page" href="/">
                <i class="far fa-sticky-note mr-1" height="20" loading="lazy" style="margin-top: 2px;">hitchhike</i>
            </a>
        </div>

        <!-- Right elements -->
        <ul class="navbar-nav flex-row">
            <li class="nav-item me-3 me-lg-1">
                <!-- Search form -->
                <form class="input-group w-auto my-auto d-none d-flex" action="/">
                    <input type="keyword" class="form-control rounded" placeholder="都道府県・都市名" aria-label="Search" name="keyword" value="{{ request('keyword') }}"/>
                    <button class="input-group-text border-0 d-none d-flex" type="submit" data-mdb-ripple-color="dark" style="background-color: #e3f2fd;">
                        <span type="submit" style="background-color: #e3f2fd;"><i class="fas fa-search"></i></span>
                    </button>
                </form>
            </li>

            <!-- during not login -->
            @guest
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link d-sm-flex align-items-sm-center" href="{{ route('register') }}">ユーザー登録</a>
                </li>
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link d-sm-flex align-items-sm-center" href="{{ route('login') }}">ログイン</a>
                </li>
            @endguest

            <!-- during login -->
            @auth
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link d-sm-flex align-items-sm-center" href="{{ route('spots.create') }}"><i class="fas fa-pen mr-1"></i></a>
                </li>

                <li class="nav-item me-3 me-lg-1 dropdown">
                    <a class="nav-link d-sm-flex align-items-sm-center dropdown-toggle hidden-arrow" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" role="button">
                        <img src="{{ Storage::url(Auth::user()->image_profile) }}" class="rounded-circle" height="22" loading="lazy" alt="">
                        <strong class="d-none d-sm-block ms-1">{{ Auth::user()->name }}</strong>
                    </a>

                    <!-- dropdown -->
                    <ul class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <button class="dropdown-item" onclick="location.href='{{ route('users.show', ['name' => Auth::user()->name]) }}'">My page</button>
                        </li>
                        <li>
                            <button class="dropdown-item" form="logout-button" type="submit">Logout</button>
                        </li>
                    </ul>

                </li>
                <form id="logout-button" method="POST" action=" {{ route('logout') }} ">
                    @csrf
                </form>
            @endauth
        </ul>
    </div>
</nav>
</header>
