<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="body-blue">
<div class="container admin-container">
    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 admin-menu">
            @section('menu')
                @include('public.styles')

                <div class="admin-menu-inner">
                    <a href="{{route('admin')}}" class="admin-logo">
                        <img src="{{ asset('storage/images/admin/admin_logo.png')}}" alt="">
                    </a>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @if(in_array(Route::current()->getName(),['admin.order.all', 'admin.order.show'])) active @endif" href="{{route('admin.order.all')}}">
                                <img src="{{ asset('storage/images/admin/green-bag.png')}}" alt="">
                                ЗАКАЗЫ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(in_array(Route::current()->getName(),['admin.user.all', 'admin.user.show', 'admin.user.update'])) active @endif" href="{{route('admin.user.all')}}">
                                <img src="{{ asset('storage/images/admin/green-users.png')}}" alt="">
                                ПОЛЬЗОВАТЕЛИ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(in_array(Route::current()->getName(),['admin.category.all', 'admin.category.show', 'admin.product.show','admin.product.add', 'admin.product.update'])) active @endif" href="{{route('admin.category.all')}}">
                                <img src="{{ asset('storage/images/admin/green-goods.png')}}" alt="">
                                ТОВАРЫ
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">--}}
{{--                                <img src="{{ asset('storage/images/admin/green-categories.png')}}" alt="">--}}
{{--                                КАТЕГОРИИ--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="admin-exit">
                        <span>admin@mail.ru</span>
                        <a href="{{route('admin.logout')}}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                        >Выйти</a>
                    </div>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>

                @include('public.scripts')
            @show
        </div>
        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 admin-info">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>