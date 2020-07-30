
@extends('public.layout')

@section('content')
    <div class="background">

    </div>
    <div class="new-goods">
        <div class="new-goods-header">
            <p>Новые товары</p>
            <div class="new-goods-header-arrows">
                <div class="arrow arrow-left"></div>
                <div class="arrow arrow-right"></div>
            </div>
        </div>

    </div>

    @include('public.new_goods', $newGoods)

    <div class="promo">
        <img src="{{asset('/storage/images/promo-1.png')}}" alt="" class="promo-photo1">
        <img src="{{asset('/storage/images/promo-2.png')}}" alt="" class="promo-photo1">
        <img src="{{asset('/storage/images/promo-3.png')}}" alt="" class="promo-photo2">
    </div>

    @include('public.popular_goods', $popularGoods);

    <div class="about">
        <div class="about-text">
            <h4>О магазине</h4>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
            <p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vita</p>
        </div>
    </div>

    <script>
        $(function() {
             $(window).resize(function(){
                var w = $(window).width();
                if(w > 320 && menu.is(':hidden')) {
                    menu.removeAttr('style');
                }
            });
        });
    </script>

@endsection
