@extends('public.layout')

@section('content')
    <h1 class="main-header">{{ $good->category()->first()->name }}</h1>
    <span style="font-family: Supermolot-Light;"><a href="{{route('category', $category_id)}}" style="color: red;">ВЕРНУТЬСЯ В КАТАЛОГ</a></span>
    <section class="product-info" style="background: #fff;">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <ul id="ProductGallery">
                    @if(count($good->images()->get()) > 0)
                        @foreach($good->images()->get() as $image)
                            <li class="product-item-thimb" data-thumb="{{asset($image->name)}}" data-src="{{asset($image->name)}}">
                                <a class="lightBox" href="{{asset($image->name)}}"> <div id="zoom"> <img src="{{asset('/storage/images//product/zoom.png')}}"> </div> </a>
                                <a href="javascript:void(0)" rel="1" class="fb-img">
                                    <img src="{{asset($image->name)}}" alt="" class="js-cart-image" />
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li class="product-item-thimb" data-thumb="{{asset('/storage/images/good-image.png')}}" data-src="{{asset('/storage/images/good-image.png')}}">
                            <a class="lightBox" href="{{asset('/storage/images/good-image.png')}}"> <div id="zoom"> <img src="{{asset('/storage/images//product/zoom.png')}}"> </div> </a>
                            <a href="javascript:void(0)" rel="1" class="fb-img">
                                <img src="{{asset('/storage/images/good-image.png')}}" alt="" class="js-cart-image" />
                            </a>
                        </li>
                    @endif
                </ul>

                @if($good->images()->get() && count($good->images()->get()) > 1)
                    <div class="cat-detail-btn">
                        <img id="SliderDetailsBtnLeft" src="{{asset('/storage/images/left.png')}}" alt="">
                        <img id="SliderDetailsBtnRight" src="{{asset('/storage/images/right.png')}}" alt="">
                    </div>
                @endif

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 product-name">
                <h3>{{ $good->name }}</h3>
                <p class="product-description">
                    {{ $good->description }}
                </p>

                <div class="select">
                    <label for="slct">Выберите вариант:</label>
                    <select name="slct" id="slct">
                        <option value="1">Синий</option>
                        <option value="2">Красный</option>
                        <option value="3">Желтый</option>
                    </select>
                </div>

            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="product-card">
                    @if($good->old_price)
                        <span class="product-card-old-price">{{ $good->old_price }}</span>
                    @endif
                    <span class="product-card-current-price">{{ number_format($good->price, 0, '', ' ' ) }} руб</span>
                    @if($good->active)
                        <span class="product-card-item-available">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                есть в наличии
                        </span>
                        <a href="javascript:void(0)" class="product-card-buy"
                            data-id = "{{ $good->id }}"
                            data-price = "{{ $good->price }}"
                           @if(isset($good->images()->first()->name))
                            data-image = "{{ $good->images()->first()->name }}"
                           @else
                            data-image = '/storage/images/good-image.png'
                           @endif
                            data-name = "{{ $good->name }}"
                        >
                            <button>КУПИТЬ</button>
                        </a>
                    @else
                            <span class="product-card-item-available">
                                <i class="fa fa-times-circle" aria-hidden="true" style="color: red"></i>
                                нет в наличии
                        </span>
                    @endif
                </div>

                <div class="product-card-info">
                    <div class="product-card-info-item car">
                        <img src="{{asset('/storage/images/product/car.png')}}" alt="">
                        <div class="card-info-item-text">
                            <p class="bold-text">БЕСПЛАТНАЯ ДОСТАВКА</p>
                            <p class="thin-text">по всей России</p>
                        </div>

                    </div>
                    <div class="product-card-info-item hot-line">
                        <img src="{{asset('/storage/images/product/girl.png')}}" alt="">
                        <div class="card-info-item-text">
                            <p class="bold-text">ГОРЯЧАЯ ЛИНИЯ</p>
                            <p class="thin-text">8 800 000-00-00</p>
                        </div>
                    </div>
                    <div class="product-card-info-item presents">
                        <img src="{{asset('/storage/images/product/present.png')}}" alt="">
                        <div class="card-info-item-text">
                            <p class="bold-text">ПОДАРКИ</p>
                            <p class="thin-text">каждому покупателю</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('public.popular_goods', $popularGoods);

    <script>
        $(function() {
            $('.product-card-buy button').on('click', function () {
                var goodId = $(this).closest('a').data('id');
                var goodPrice = parseFloat($(this).closest('a').data('price'));
                var goodImage = $(this).closest('a').data('image');
                var goodName = $(this).closest('a').data('name');

                var cartItem = {
                    'id': goodId,
                    'name': goodName,
                    'image' : goodImage,
                    'price': goodPrice,
                    'quantity': 1
                }
                addToCart(cartItem);

            });

            var upper_goods_slider = $("#content-slider").lightSlider({
                item:1,
                loop:true,
                pager: false,
            });

            $('.new-goods-header-arrows .arrow-left').on('click', function () {
                upper_goods_slider.goToPrevSlide();
            });

            $('.new-goods-header-arrows .arrow-right').on('click', function () {
                upper_goods_slider.goToNextSlide();
            });

        });
    </script>

@endsection