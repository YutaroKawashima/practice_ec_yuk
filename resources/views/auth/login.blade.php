@extends('layouts.auth')

@section('title', 'ログインページ')

@section('content')
    @guest
    <div class="login-area form-box">
        <form method="post" action="{{ route('login') }}" class = "login-form">
            {{ csrf_field() }}
            <div class="form-item form-title"> Login </div>
            <div class="form-item">
                <p class="mail-area">
                    <label for="email">
                        E-mail Address（メールアドレス）
                    </label>
                    <p>
                        <input type="text" name="email" placeholder="example@gmail.com" class="mail-form" value="{{ old('email') }}" required>
                    </p>
                </p>
                <p class="pass-area">
                    <label for="password">
                        Password（パスワード）
                    </label>
                    <p>
                        <input type="password" name="password" placeholder="6文字以上" class="pass-form" required>
                    </p>
                </p>
                <div class = "submit-area">
                    <button type="submit" class="submit-login">
                        Login
                    </button>
                    <a href="" class="set-pass">
                        Forgot your password？
                    </a>
                </div>
            </div>
        </form>
    </div>
    @else
        <p> ログインしています！ </p>
    @endguest
@endsection
