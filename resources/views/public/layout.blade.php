<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diplom</title>

    @include('public.styles')
    <!--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css" />-->

    @include('public.scripts')
</head>
<body style="background-color: #dee1e3">
@section('menu')
    <div class="home">
        <a href="{{ route('home') }}" class="logo">
            <div class="super">SUPER</div>
            <div class="shop">SHOP</div>
        </a>
        <div class="menu">
            <nav class="">
                <ul class="clearfix">
                    @foreach($categories as $category)
                        <li @if(isset($category_id) && $category_id == $category->id)class="active" @endif><a href="{{ route('category', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
                <a href="#" id="pull">Меню</a>
            </nav>
        </div>
        <div class="right-block">
            <div class="right-block-reistration">
                @if(!Auth::check())
                    <a href="{{route('login')}}" class="right-block-reistration-enter">Войти</a>
                    <a href="{{route('register')}}" class="right-block-reistration-register">Регистрация</a>
                @else
                    <a href="{{route('account')}}" class="right-block-reistration-enter">{{cropText(Auth::user()->email)}}</a>
                    <a href="{{route('logout')}}" class="right-block-reistration-register"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                    Выйти</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
            </div>
            <a class="card-href" href="{{route('card')}}">
                <div class="right-block-cart">
                    <div class="right-block-cart-price"></div>
                    <div class="right-block-cart-count"></div>
                </div>
            </a>

        </div>
    </div>
@show

<div class="container">
    @yield('content')
</div>


@section('footer')
    <div class="footer">
        <div class="footer-site-info">
            <p>Шаблон для экзамнационного задания</p>
            <p>Разработан специально для «Всероссийской Школы Программирования» </p>
            <p><a href="http://bedev.ru/">http://bedev.ru/</a></p>
        </div>
        <div class="footer-up">
            <span>Наверх</span>
            <img src="./assets/images/up_arrow.png" alt="">
        </div>
    </div>
@show
</body>
</html>

<script>
    $( document ).ready(function() {
        cartInit();
    });
</script>