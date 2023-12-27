<header>
    <div class="navbar-nav ms-auto dropdown-menu">
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
        <p class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
        </p>
        @endif

        @if (Route::has('register'))
        <p class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">新規登録</a>
        </p>
        @endif
        @endguest
    </div>

    @auth
    <div class = "navbar-nav ms-auto admin_menu">
        @can('admin-higher')
        <div class ="admin">
            <p>管理者メニュー</p>
            <a href = "userlist">ユーザー一覧へ</a>
        </div>
    
         @endcan
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <p>
                <a href = "mypage">マイページ</a>
            </p>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                ログアウト
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div> 
    </div>
@endauth
</header>