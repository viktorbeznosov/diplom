@extends('admin.layout')

@section('menu')
    @include('public.styles')
    <a href="{{route('admin')}}" class="admin-logo">
        <img src="{{ asset('storage/images/admin/admin_logo.png')}}" alt="">
    </a>
@endsection

@section('content')
    <form name="login" method="POST" action="{{ route('admin.login.post') }}" style="margin-right: 13px;">
        {{csrf_field()}}
        <label for="email">
            E-mail:
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        </label>
        <label for="password">
            Password:
            <input id="password" type="password" class="form-control" name="password" required>
        </label>
        <div class="login-buttons">
            <input type="submit" value="Войти">
        </div>
        @if (count($errors->all()) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
    </form>

{{--    <pre>--}}
{{--        {{ print_r($errors->all()) }}--}}
{{--    </pre>--}}

@endsection