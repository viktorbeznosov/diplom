@extends('public.layout')

@section('content')
    <h1 class="main-header">ЛИЧНЫЙ КАБИНЕТ</h1>
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="account">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h5>Ваши данные</h5>
                <form action="{{ route('user_update') }}" name="account" method="post">
                    {{ csrf_field() }}
                    <label for="account_name">
                        Контактное лицо (ФИО):
                        <input type="text" name="user_name" id="user_name" value="{{ Auth::user()->name }}">
                    </label>
                    <label for="account_phone">
                        Телефон:
                        <input type="text" name="user_phone" id="user_phone" value="{{ Auth::user()->phone }}">
                    </label>
                    <label for="account_email">
                        E-mail:
                        <input type="text" name="user_email" id="user_email" value="{{ Auth::user()->email }}">
                    </label>
                    <h5>Адрес доставки</h5>
                    <label for="account_state">
                        Город:
                        <input type="text" name="user_state" id="user_state" value="{{ Auth::user()->state }}">
                    </label>
                    <label for="account_street">
                        Улица:
                        <input type="text" name="user_street" id="user_street" value="{{ Auth::user()->street }}">
                    </label>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="account_house">
                                Дом:
                                <input type="text" name="user_house" id="user_house" value="{{ Auth::user()->house }}">
                            </label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="account_flat">
                                Квартира:
                                <input type="text" name="user_flat" id="user_flat" value="{{ Auth::user()->flat }}">
                            </label>
                        </div>
                    </div>
                    <h5>Изменение пароля</h5>
                    <label for="account_password">
                        Введите новый пароль:
                        <input type="password" name="user_password" id="user_password">
                    </label>
                    <label for="account_confirm_password">
                        Подтвердите новый пароль:
                        <input type="password" name="user_confirm_password" id="user_confirm_password">
                    </label>
                    <input type="submit" value="Сохранить">
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 orders">
                <h5>Ваши заказы</h5>
                @foreach($orders as $order)
                    <div class="order-item">
                        <div class="order-item-info">
                            <span>№ {{ $order->id }}</span>
                            <span>({{ number_format($order->getTotalPrice(), 0, '', ' ' ) }} руб)</span>
                            <span>{{ $order->getDate() }} в {{ $order->getTime() }}</span>
                        </div>
                        <div class="order-item-status">{{ $order->status->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            $('form[name="account"]').on("submit", function () {
                var error = false;
                var name = $('input[name="user_name').val();
                var email = $('input[name="user_email').val();
                var phone = $('input[name="user_phone').val();
                var password = $('input[name="user_password').val();
                var confirm_password = $('input[name="user_confirm_password').val();

                var re = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;
                if (!re.test(email) && email != ''){
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.warning('Введите email в определенном формате!');
                    error = true;
                }

                if (!name || name == ''){
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.warning('Имя пользователя не должно быть пустым!');
                    error = true;
                }

                if (!email || email == ''){
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.warning('Email не дожен быть пустым!');
                    error = true;
                }

                if (password && password != confirm_password){
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.warning('Пароли не совпадают!');
                    error = true;
                }

                if(error){
                    return false;
                }
            });
        });
    </script>

@endsection
