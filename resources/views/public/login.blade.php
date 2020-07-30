@extends('public.layout')

@section('content')
<h1 class="main-header">ВХОД</h1>
<div class="login">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <h5>Зарегистрированыый пользователь</h5>
            <form action="{{route('account')}}" name="login" method="post">
                {{csrf_field()}}
                <label for="log_email">
                    E-mail:
                    <input type="text" name="log_email" id="log_email">
                </label>
                <label for="log_pass">
                    E-mail:
                    <input type="password" name="log_pass" id="log_pass">
                </label>
                <div class="login-buttons">
                    <input type="submit" value="Войти">
                    <a href="javascript:void(0)" class="remember-password">Забыли пароль</a>
                </div>

            </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 new-user">
            <h5>Новый пользователь</h5>
            <a href="{{route('register')}}" class="login-register">Зарегистрироваться</a>
        </div>
    </div>
</div>
@endsection