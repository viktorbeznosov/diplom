@extends('public.layout')

@section('content')
<h1 class="main-header">ОФОРМЛЕНИЕ ЗАКАЗА</h1>
<div class="checkout">
    @if(!Auth::user())
        <section class="checkout-contact-info">
            <div class="checkout-contact-info-header header-black">
                <span>1.</span>
                <span>Контактная информация</span>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 registration">
                        <div class="inner">
                            <h5>Для новых покупателей</h5>
                            <form method="POST" action="{{ route('register') }}" class="" name="checkout-registration">
                                {{ csrf_field() }}
                                <label for="reg_name">
                                    Контактное лицо (ФИО):
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                </label>
                                <label for="reg_phone">
                                    Контактный телефон:
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                </label>
                                <label for="reg_email">
                                    Email:
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                                </label>
                                <input type="submit" value="Продолжить" class="checkout-regsubmit">
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 login">
                        <div class="inner">
                            <h5>Быстрый вход</h5>
                            <form method="POST" action="{{ route('login') }}">
                                {{csrf_field()}}
                                <label for="login_email">
                                    Email:
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                </label>
                                <label for="login_password">
                                    Password:
                                    <input id="password" type="password" class="form-control" name="password">
                                </label>
                                <input type="submit" value="Войти" class="checkout-login">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        @if(!isset($order))
            <section class="checkout-delivery-info">
                <div class="checkout-delivery-info-header header-black">
                    <span>2.</span>
                    <span>Информация о заказе</span>
                </div>
                <div class="content">
                    <form action="{{ route('order.info') }}" method="post" name="order_info">
                        {{ csrf_field() }}
                        <input type="hidden" id="cart" name="cart">
                        <input type="hidden" name="order_info" value="1">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 delivery-address">
                                <div class="inner">
                                    <h5>Адрес доставки</h5>
                                    <label for="state">
                                        Город:
                                        <input type="text" name="state" id="state" value="{{ old('state') }}">
                                    </label>
                                    <label for="street">
                                        Улица:
                                        <input type="text" name="street" id="street" value="{{ old('street') }}">
                                    </label>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label for="house">
                                                Дом:
                                                <input type="text" name="house" id="house" value="{{ old('house') }}">
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label for="flat">
                                                Квартира:
                                                <input type="text" name="flat" id="flat" value="{{ old('flat') }}">
                                            </label>
                                        </div>

                                    </div>
                                    <input type="submit" value="Продолжить">
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 delivery-type">
                                <div class="inner">
                                    <h5>Способ доставки</h5>
                                    <div class="chech2-radioblock">
                                        @foreach($destinations as $dest)
                                            <input id="dest{{$dest->id}}" name="dest" value="{{$dest->id}}" type="radio" checked="checked">
                                            <label for="dest{{$dest->id}}">
                                                <div style="display:inline-block;max-width: 260px;">
                                                    {{ $dest->name }}
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 delivery-comment">
                                <div class="inner">
                                    <h5>Комментарий к заказу</h5>
                                    <label for="comment">
                                        Введите ваш комментарий
                                        <textarea name="comment" id="comment" cols="30" rows="10">{{ old('comment') }}</textarea>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        @else
            <section class="checkout-order-confirm">
                <div class="checkout-order-confirm-header header-black">
                    <span>3.</span>
                    <span>Подтверждение заказа</span>
                </div>
                <div class="content">
                    <div class="inner">
                        <h5>Состав заказа</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Товар</th>
                                    <th>Стоимость</th>
                                    <th>Количество</th>
                                    <th>Итого</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order['cart']->items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }} руб.</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price * $item->quantity }} руб.</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="checkout-result">
                            <span>Итого:</span>
                            <span>{{ $order['cart']->totalPrice }} руб.</span>
                        </div>
                        <h5>Доставка:</h5>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="checkout-delivery-info-item">
                                    <span>Контактное лицо (ФИО):</span>
                                    <span>{{ $user->name }}</span>
                                </div>
                                <div class="checkout-delivery-info-item">
                                    <span>Контактный телефон:</span>
                                    <span>{{ $user->phone }}</span>
                                </div>
                                <div class="checkout-delivery-info-item">
                                    <span>E-mail:</span>
                                    <span>{{ $user->email }}</span>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="checkout-delivery-info-item">
                                    <span>Город:</span>
                                    <span>{{ $order['state'] }}</span>
                                </div>
                                <div class="checkout-delivery-info-item">
                                    <span>Улица:</span>
                                    <span>{{ $order['street'] }}</span>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="checkout-delivery-info-item">
                                            <span>Дом:</span>
                                            <span>{{ $order['house'] }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="checkout-delivery-info-item">
                                            <span>Квартира:</span>
                                            <span>{{ $order['flat'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                <div class="checkout-delivery-info-item">
                                    <span>Способ доставки:</span>
                                    <span>{{ $order['dest']->name }}</span>
                                </div>
                                <div class="checkout-delivery-info-item">
                                    <span>Коментарий к заказу:</span>
                                    <span>{{ $order['comment']}}</span>
                                </div>
                            </div>
                        </div>
                        <form name="order_confirm" action="{{route('order.confirm')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="order_confirm" value="1">
                            <input type="hidden" name="cart" value="{{ $order['cart_json'] }}">
                            <input type="hidden" name="state" value="{{ $order['state'] }}">
                            <input type="hidden" name="street" value="{{ $order['street'] }}">
                            <input type="hidden" name="house" value="{{ $order['house'] }}">
                            <input type="hidden" name="flat" value="{{ $order['flat'] }}">
                            <input type="hidden" name="dest" value="{{ $order['dest']->id }}">
                            <input type="hidden" name="comment" value="{{ $order['comment']}}">
                            <input type="submit" class="checkout-submit" value="Подтвердить заказ">
                        </form>
                    </div>
                </div>
            </section>
        @endif
    @endif
</div>

<script>
    $(document).ready(function () {
        //Предотвращение повторной отправки формы
        @if(isset($_POST['order_info']))
            if ($('form[name="order_info"]')[0]){
                $('form[name="order_info"]')[0].reset();
            }
        @endif

        //Если корзина пустая - по кнопку "Подтвердить" заказ скрываем
        if($('form[name="order_confirm"]')[0] && getCart().length == 0){
            $('form[name="order_confirm"]')[0].reset();
            $('form[name="order_confirm"]').hide();
        }

        if (getCart().length == 0){
            $('form[name="order_info"]').find('input[type="submit"]').attr('disabled','disabled').css('background-color','#c0c0c0');
        } else {
            $('form[name="order_info"]').find('input[type="submit"]').removeAttr('disabled').css('background-color','#ed1651');
        }
        $('form[name="order_info"]').on('submit', function () {
            var error = false;
            var state = $('#state').val();
            if (!state || state == ''){
                toastr.options = {
                    "closeButton": true
                }
                toastr.warning('Нзавание города не должно быть пустым!');
                error = true;
            }
            var street = $('#street').val();
            if (!street || street == ''){
                toastr.options = {
                    "closeButton": true
                }
                toastr.warning('Нзавание улицы не должно быть пустым!');
                error = true;
            }
            var house = $('#house').val();
            if (!house || house == ''){
                toastr.options = {
                    "closeButton": true
                }
                toastr.warning('Введите номер дома');
                error = true;
            }
            var flat = $('#flat').val();
            if (!flat || flat == ''){
                toastr.options = {
                    "closeButton": true
                }
                toastr.warning('Введите номер квартиры');
                error = true;
            }
            if (getCart().length == 0){
                toastr.options = {
                    "closeButton": true
                }
                toastr.warning('Корзина пуста!');
                error = true;
            }
            if (error){
                return false;
            } else {
                var cart = localStorage.getItem('cart');
                if (cart){
                    $('#cart').val(cart);
                }
            }
        });

        $('form[name="order_confirm"]').on('submit', function () {
            localStorage.clear();
        });
    });
</script>
@endsection