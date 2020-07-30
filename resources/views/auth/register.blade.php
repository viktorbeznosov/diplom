{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-8 col-md-offset-2">--}}
{{--            <div class="panel panel-default">--}}
{{--                <div class="panel-heading">Register</div>--}}

{{--                <div class="panel-body">--}}
{{--                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">--}}
{{--                        {{ csrf_field() }}--}}

{{--                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
{{--                            <label for="name" class="col-md-4 control-label">Name</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

{{--                                @if ($errors->has('name'))--}}
{{--                                    <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('name') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
{{--                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

{{--                                @if ($errors->has('email'))--}}
{{--                                    <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('email') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
{{--                            <label for="password" class="col-md-4 control-label">Password</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control" name="password" required>--}}

{{--                                @if ($errors->has('password'))--}}
{{--                                    <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <div class="col-md-6 col-md-offset-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    Register--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

@extends('public.layout')

@section('content')
    <h1 class="main-header">РЕГИСТРАЦИЯ</h1>
    <div class="register">
        <form name="registation" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="name">
                        Контактное лицо (ФИО):
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    </label>
                    <label for="email">
                        E-mail:
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </label>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="password">
                        Пароль:
                        <input id="password" type="password" class="form-control" name="password" required>
                    </label>
                    <label for="password-confirm">
                        Повторить пароль:
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </label>
                </div>
            </div>
            <input type="submit" value="Зарегистрироваться" class="checkout-regsubmit">
        </form>

    </div>
@endsection
