@extends('public.layout')

@section('content')
    <h1 class="main-header">КОРЗИНА</h1>
    <section class="orders">
        <div class="orders-header">
            <span class="orders-header-good">Товар</span>
            <span class="orders-header-good">Доступность</span>
            <span class="orders-header-good">Стоимость</span>
            <span class="orders-header-good">Количество</span>
            <span class="orders-header-good">Итого</span>
        </div>
        <div class="order-goods">

        </div>
        <div class="order-bootom">
            <a href="{{route('category', 1)}}" class="order-back">Вернуться к покупкам</a>
            <div class="order-confirm">
                <div class="result">
                    <span>Итого:</span>
                    <span></span>
                </div>
                <a href="{{route('order')}}">Оформить заказ</a>
            </div>
        </div>
    </section>

    <script>
        function cartItemTpl(item){
            var tpl = `
            <div class="order-goods-item" data-id="`+item.id+`">
                <img src="{{asset('` + item.image + `')}}" alt="" class="order-good-img">
                <span class="good-name">`+item.name+`</span>
                <span class="good-avaliable">Есть в наличии</span>
                <span class="good-cost">`+priceFormat(item.price)+` руб</span>
                <div class="good-quantity">
                    <a href="javascript:void(0)" class="quantity-operate-dec">-</a>
                    <input type="text" class="quantity-operate-count" value="`+item.quantity+`" disabled>
                    <a href="javascript:void(0)" class="quantity-operate-inc">+</a>
                </div>
                <span class="good-result">`+priceFormat(item.price * item.quantity)+` руб</span>
                <a href="javascript:void(0)" class="order-good-delete">
                    <img src="{{asset('/storage/images/card/delete-good.png')}}" alt="">
                </a>

            </div>
            `;

             return tpl;
        }

        $( document ).ready(function() {
            var cart = getCart();

            if (cart.length == 0){
                $('.order-confirm').hide();
            } else {
                $('.order-confirm .result').find('span:last-child').html(priceFormat(cart.totalPrice) + ' руб.');

                cart.items.forEach(function (item) {
                    $('.order-goods').append(cartItemTpl(item));
                })

                $('.quantity-operate-dec').on('click', function () {
                    cartItemDec($(this));
                });

                $('.quantity-operate-inc').on('click', function () {
                    cartItemInc($(this));
                });

                $('.order-good-delete').on('click', function () {
                    removeFromCart($(this));
                });
            }

        });
    </script>
@endsection