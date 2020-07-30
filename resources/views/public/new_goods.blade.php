<div class="upper-goods-gallery">
    <ul id="content-slider" class="content-slider">
        <li>
            <div class="row">
                <div class="col-md-6 col-sm-12 slim">
                    <div class="two-items-wrap">
                        @for($i=0; $i<=1; $i++)
                            @if(isset($newGoods[$i]))
                                <div class="item">
                                    <a href="{{ route('product', $newGoods[$i]->id) }}">
                                        <img class="item-image-corner" src="{{asset($newGoods[$i]->getBageSrc())}}" alt="item-corner">
                                        @if(isset($newGoods[$i]->images()->first()->name))
                                            <img class="item-image" src="{{asset($newGoods[$i]->images()->first()->name)}}" alt="good name">
                                        @else
                                            <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        @endif
                                        <div class="item-name-and-price">
                                            <span class="item-name">{{ $newGoods[$i]->name }}</span>
                                            <span class="item-price">{{ number_format($newGoods[$i]->price, 0, '', ' ' ) }} зуб.</span>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 padding0">
                                    <div class="item">
                                        <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        <div class="item-name-and-price">
                                            <span class="item-name"></span>
                                            <span class="item-price"></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 slim">
                    <div class="two-items-wrap">
                        @for($i=2; $i<=3; $i++)
                            @if(isset($newGoods[$i]))
                                <div class="item">
                                    <a href="{{ route('product', $newGoods[$i]->id) }}">
                                        <img class="item-image-corner" src="{{asset($newGoods[$i]->getBageSrc())}}" alt="item-corner">
                                        @if(isset($newGoods[$i]->images()->first()->name))
                                            <img class="item-image" src="{{asset($newGoods[$i]->images()->first()->name)}}" alt="good name">
                                        @else
                                            <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        @endif
                                        <div class="item-name-and-price">
                                            <span class="item-name">{{ $newGoods[$i]->name }}</span>
                                            <span class="item-price">{{ number_format($newGoods[$i]->price, 0, '', ' ' ) }} зуб.</span>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 padding0">
                                    <div class="item">
                                        <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        <div class="item-name-and-price">
                                            <span class="item-name"></span>
                                            <span class="item-price"></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 slim">
                    <div class="two-items-wrap">
                        @for($i=4; $i<=5; $i++)
                            @if(isset($newGoods[$i]))
                                <div class="item">
                                    <a href="{{ route('product', $newGoods[$i]->id) }}">
                                        <img class="item-image-corner" src="{{asset($newGoods[$i]->getBageSrc())}}" alt="item-corner">
                                        @if(isset($newGoods[$i]->images()->first()->name))
                                            <img class="item-image" src="{{asset($newGoods[$i]->images()->first()->name)}}" alt="good name">
                                        @else
                                            <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        @endif
                                        <div class="item-name-and-price">
                                            <span class="item-name">{{ $newGoods[$i]->name }}</span>
                                            <span class="item-price">{{ number_format($newGoods[$i]->price, 0, '', ' ' ) }} зуб.</span>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 padding0">
                                    <div class="item">
                                        <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        <div class="item-name-and-price">
                                            <span class="item-name"></span>
                                            <span class="item-price"></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 slim">
                    <div class="two-items-wrap">
                        @for($i=6; $i<=7; $i++)
                            @if(isset($newGoods[$i]))
                                <div class="item">
                                    <a href="{{ route('product', $newGoods[$i]->id) }}">
                                        <img class="item-image-corner" src="{{asset($newGoods[$i]->getBageSrc())}}" alt="item-corner">
                                        @if(isset($newGoods[$i]->images()->first()->name))
                                            <img class="item-image" src="{{asset($newGoods[$i]->images()->first()->name)}}" alt="good name">
                                        @else
                                            <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        @endif
                                        <div class="item-name-and-price">
                                            <span class="item-name">{{ $newGoods[$i]->name }}</span>
                                            <span class="item-price">{{ number_format($newGoods[$i]->price, 0, '', ' ' ) }} зуб.</span>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 padding0">
                                    <div class="item">
                                        <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        <div class="item-name-and-price">
                                            <span class="item-name"></span>
                                            <span class="item-price"></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-6 col-sm-12 slim">
                    <div class="two-items-wrap">
                        @for($i=8; $i<=9; $i++)
                            @if(isset($newGoods[$i]))
                                <div class="item">
                                    <a href="{{ route('product', $newGoods[$i]->id) }}">
                                        <img class="item-image-corner" src="{{asset($newGoods[$i]->getBageSrc())}}" alt="item-corner">
                                        @if(isset($newGoods[$i]->images()->first()->name))
                                            <img class="item-image" src="{{asset($newGoods[$i]->images()->first()->name)}}" alt="good name">
                                        @else
                                            <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        @endif
                                        <div class="item-name-and-price">
                                            <span class="item-name">{{ $newGoods[$i]->name }}</span>
                                            <span class="item-price">{{ number_format($newGoods[$i]->price, 0, '', ' ' ) }} зуб.</span>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 padding0">
                                    <div class="item">
                                        <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        <div class="item-name-and-price">
                                            <span class="item-name"></span>
                                            <span class="item-price"></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 slim">
                    <div class="two-items-wrap">
                        @for($i=10; $i<=11; $i++)
                            @if(isset($newGoods[$i]))
                                <div class="item">
                                    <a href="{{ route('product', $newGoods[$i]->id) }}">
                                        <img class="item-image-corner" src="{{asset($newGoods[$i]->getBageSrc())}}" alt="item-corner">
                                        @if(isset($newGoods[$i]->images()->first()->name))
                                            <img class="item-image" src="{{asset($newGoods[$i]->images()->first()->name)}}" alt="good name">
                                        @else
                                            <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        @endif
                                        <div class="item-name-and-price">
                                            <span class="item-name">{{ $newGoods[$i]->name }}</span>
                                            <span class="item-price">{{ number_format($newGoods[$i]->price, 0, '', ' ' ) }} зуб.</span>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 padding0">
                                    <div class="item">
                                        <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        <div class="item-name-and-price">
                                            <span class="item-name"></span>
                                            <span class="item-price"></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 slim">
                    <div class="two-items-wrap">
                        @for($i=12; $i<=13; $i++)
                            @if(isset($newGoods[$i]))
                                <div class="item">
                                    <a href="{{ route('product', $newGoods[$i]->id) }}">
                                        <img class="item-image-corner" src="{{asset($newGoods[$i]->getBageSrc())}}" alt="item-corner">
                                        @if(isset($newGoods[$i]->images()->first()->name))
                                            <img class="item-image" src="{{asset($newGoods[$i]->images()->first()->name)}}" alt="good name">
                                        @else
                                            <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        @endif
                                        <div class="item-name-and-price">
                                            <span class="item-name">{{ $newGoods[$i]->name }}</span>
                                            <span class="item-price">{{ number_format($newGoods[$i]->price, 0, '', ' ' ) }} зуб.</span>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 padding0">
                                    <div class="item">
                                        <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        <div class="item-name-and-price">
                                            <span class="item-name"></span>
                                            <span class="item-price"></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 slim">
                    <div class="two-items-wrap">
                        @for($i=14; $i<=15; $i++)
                            @if(isset($newGoods[$i]))
                                <div class="item">
                                    <a href="{{ route('product', $newGoods[$i]->id) }}">
                                        <img class="item-image-corner" src="{{asset($newGoods[$i]->getBageSrc())}}" alt="item-corner">
                                        @if(isset($newGoods[$i]->images()->first()->name))
                                            <img class="item-image" src="{{asset($newGoods[$i]->images()->first()->name)}}" alt="good name">
                                        @else
                                            <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        @endif
                                        <div class="item-name-and-price">
                                            <span class="item-name">{{ $newGoods[$i]->name }}</span>
                                            <span class="item-price">{{ number_format($newGoods[$i]->price, 0, '', ' ' ) }} зуб.</span>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 padding0">
                                    <div class="item">
                                        <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                                        <div class="item-name-and-price">
                                            <span class="item-name"></span>
                                            <span class="item-price"></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        </li>
    </ul>

</div>

<script>
    $(function() {
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

        var popular_goods_slider = $("#popular-content-slider").lightSlider({
            item:4,
            slideMove:2,
            loop:true,
            pager: false,
            responsive : [
                {
                    breakpoint:800,
                    settings: {
                        item:2,
                        slideMove:1,
                        slideMargin:6,
                    }
                },
                {
                    breakpoint:480,
                    settings: {
                        item:1,
                        slideMove:1
                    }
                }
            ]
        });

        $('.popular-goods-header-arrows .arrow-left').on('click', function () {
            popular_goods_slider.goToPrevSlide();
        });

        $('.popular-goods-header-arrows .arrow-right').on('click', function () {
            popular_goods_slider.goToNextSlide();
        });
    });

</script>
