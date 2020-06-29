<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset = "UTF-8">
        <title> @yield('title') </title>
        <link rel = "stylesheet" href = "css/auth.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
    </head>
    <body>
        <header>
            <div class = "item-area height-70px">
                <a href = "{{ url('management') }}">
                    <img class = "logo" src = "{{ asset('./storage/image/logo.png') }}" alt = "CodeSHOP">
                </a>
                @guest
                    <a href="{{ url('register') }}" class="menu-item direct-R">
                        Register
                    </a>
                    <a href="{{ url('login') }}" class="menu-item direct-L">
                        Login
                    </a>
                @else
                    <form method="post" action="{{ url('logout') }}" class="menu-item">
                        {{ csrf_field() }}
                        <button type="submit" class = "menu-item logout">
                            Logout
                        </button>
                    </form>
                @endguest
            </div>
        </header>

        @yield('content')
    </body>
</html>
