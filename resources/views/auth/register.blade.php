@extends('layouts.auth')

@section('title', 'ユーザー登録ページ')

@section('content')
    @guest
        <div class="login-area form-box">
            <form method="post" action="{{ url('register') }}" class = "login-form">
                {{ csrf_field() }}
                <div class="form-item form-title"> Register（新規登録） </div>
                <div class="form-item">
                    <p class="name-area">
                        <label for="name">
                            Username（ユーザー名）
                        </label>
                        <p>
                            <input type="text" name="name" placeholder="20文字以内" class="name-form @if($errors->has('name')) is-invalid @endif" value="{{ old('name') }}" required>
                            @if($errors->has('name'))
                                <span>
                                    <strong> {{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </p>
                    </p>
                    <p class="mail-area">
                        <label for="email">
                            E-mail Address（メールアドレス）
                        </label>
                        <p>
                            <input type="text" name="email" placeholder="example@gmail.com" class="mail-form @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <p>
                                    <strong> {{ $errors->first('email') }}</strong>
                                </p>
                            @endif
                        </p>
                    </p>
                    <p class="pass-area">
                        <label for="password">
                            Password（パスワード）
                        </label>
                        <p>
                            <input type="password" name="password" placeholder="6文字以上" class="pass-form" value="{{ old('password') }}">
                        </p>
                    </p>
                    <p class="pass_confirm-area">
                        <label for="password_confirmation">
                            Password（確認用パスワード）
                        </label>
                        <p>
                            <input type="password" name="password_confirmation" placeholder="上記と同じパスワードを入力" class="pass-form" value="{{ old('password') }}">
                        </p>
                    </p>
                    <div class = "submit-area">
                        <button type="submit"  value="send" class="submit-login">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @else
        <p> ログインしています！ </p>
    @endguest
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
