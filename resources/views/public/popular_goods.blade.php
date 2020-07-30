<div class="popular-goods">
    <div class="popular-goods-header">
        <p>Популярные товары</p>
        <div class="popular-goods-header-arrows">
            <div class="arrow arrow-left"></div>
            <div class="arrow arrow-right"></div>
        </div>
    </div>
    <div class="popular-goods-gallery">
        <ul id="popular-content-slider" class="popular-content-slider">
            @foreach($popularGoods as $good)
                <li>
                    <a href="{{ route('product', $good->id) }}">
                        <div class="item">
                            <img class="item-image-corner" src="{{asset($good->getBageSrc())}}" alt="item-corner">
                            @if(isset($good->images()->first()->name))
                                <img class="item-image" src="{{asset($good->images()->first()->name)}}" alt="good name">
                            @else
                                <img class="item-image" src="{{asset('/storage/images/good-image.png')}}" alt="good name">
                            @endif
                            <div class="item-name-and-price">
                                <span class="item-name">{{ $good->name }}</span>
                                <span class="item-price">{{ number_format($good->price, 0, '', ' ' ) }} руб.</span>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    $(function() {
        var popular_goods_slider = $("#popular-content-slider").lightSlider({
            item:4,
            slideMove:2,
            loop:false,
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
