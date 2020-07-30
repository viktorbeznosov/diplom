@extends('public.layout')

{{--@include('public.scripts')--}}

@section('content')
    <h1 class="main-header">{{ $category->name }}</h1>
    <span style="font-family: Supermolot-Light;">ПОКАЗАНО 1-17 ИЗ 100 ТОВАРОВ</span>
    <div class="category good-container" style="width: 100%;">
        <div class="goods-header">
            <div class="goods-pagination">
                <span class="pages-span">Страницы:</span>
                {{ $goods->links() }}
            </div>
        </div>
        <div class="goods">
            <section class="good-container-bike" style="display: flex;">
                @for($i = 0; $i <= 0; $i++)
                    <div class="row padding15">
                        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 padding0">
                            <img src="{{asset('/storage/images/category/bike.png')}}" alt="" style="width: 100%;height: 347px;object-fit: cover;">
                        </div>
                        @if(isset($goods->items()[$i]))
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 padding0">
                                <div class="item">
                                    <img class="item-image-corner" src="{{asset($goods->items()[$i]->getBageSrc())}}" alt="item-corner">
                                    <a href="{{route('product', $goods->items()[$i]->id)}}"><img class="item-image"
                                        @if($goods->items()[$i]->images()->first())
                                            src="{{asset($goods->items()[$i]->images()->first()->name)}}"
                                        @else
                                            src="{{asset('/storage/images/good-image.png')}}"
                                        @endif
                                    alt="good name"
                                    ></a>
                                    <div class="item-name-and-price">
                                        <span class="item-name">{{ $goods->items()[$i]->name }}</span>
                                        <span class="item-price">{{ number_format($goods->items()[$i]->price, 0, '', ' ' ) }} руб.</span>
                                    </div>
                                </div>
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
                    </div>
                @endfor
            </section>
            <section class="good-container-middle" style="display: flex;">
                <div class="row padding15">
                    @for ($i = 1; $i <= 4; $i++)
                        @if(isset($goods->items()[$i]))
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 padding0">
                                <div class="item">
                                    <img class="item-image-corner" src="{{asset($goods->items()[$i]->getBageSrc())}}" alt="item-corner">
                                    <a href="{{route('product', $goods->items()[$i]->id)}}"><img class="item-image"
                                         @if($goods->items()[$i]->images()->first())
                                            src="{{asset($goods->items()[$i]->images()->first()->name)}}"
                                         @else
                                            src="{{asset('/storage/images/good-image.png')}}"
                                         @endif
                                     alt="good name"
                                    ></a>
                                    <div class="item-name-and-price">
                                        <span class="item-name">{{ $goods->items()[$i]->name }}</span>
                                        <span class="item-price">{{ number_format($goods->items()[$i]->price, 0, '', ' ' ) }} руб.</span>
                                    </div>
                                </div>
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
                    @for ($i = 5; $i <= 8; $i++)
                        @if(isset($goods->items()[$i]))
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 padding0">
                                <div class="item">
                                    <img class="item-image-corner" src="{{asset($goods->items()[$i]->getBageSrc())}}" alt="item-corner">
                                    <a href="{{route('product', $goods->items()[$i]->id)}}"><img class="item-image"
                                         @if($goods->items()[$i]->images()->first())
                                            src="{{asset($goods->items()[$i]->images()->first()->name)}}"
                                         @else
                                            src="{{asset('/storage/images/good-image.png')}}"
                                         @endif
                                         alt="good name"
                                    ></a>
                                    <div class="item-name-and-price">
                                        <span class="item-name">{{ $goods->items()[$i]->name }}</span>
                                        <span class="item-price">{{ number_format($goods->items()[$i]->price, 0, '', ' ' ) }} руб.</span>
                                    </div>
                                </div>
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
            </section>

            <section class="good-container-girl" style="display: flex;">
                <div class="row padding15">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding0">
                        <div class="good-container-girl-items">
                            <div class="row padding15">
                                @for ($i = 9; $i <= 10; $i++)
                                    @if(isset($goods->items()[$i]))
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding0">
                                            <div class="item">
                                                <img class="item-image-corner" src="{{asset($goods->items()[$i]->getBageSrc())}}" alt="item-corner">
                                                <a href="{{route('product', $goods->items()[$i]->id)}}"><img class="item-image"
                                                     @if($goods->items()[$i]->images()->first())
                                                        src="{{asset($goods->items()[$i]->images()->first()->name)}}"
                                                     @else
                                                        src="{{asset('/storage/images/good-image.png')}}"
                                                     @endif
                                                     alt="good name"
                                                ></a>
                                                <div class="item-name-and-price">
                                                    <span class="item-name">{{ $goods->items()[$i]->name }}</span>
                                                    <span class="item-price">{{ number_format($goods->items()[$i]->price, 0, '', ' ' ) }} руб.</span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding0">
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
                            <div class="row padding15">
                                @for ($i = 11; $i <= 12; $i++)
                                    @if(isset($goods->items()[$i]))
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding0">
                                            <div class="item">
                                                <img class="item-image-corner" src="{{asset($goods->items()[$i]->getBageSrc())}}" alt="item-corner">
                                                <a href="{{route('product', $goods->items()[$i]->id)}}"><img class="item-image"
                                                     @if($goods->items()[$i]->images()->first())
                                                        src="{{asset($goods->items()[$i]->images()->first()->name)}}"
                                                     @else
                                                        src="{{asset('/storage/images/good-image.png')}}"
                                                     @endif
                                                     alt="good name"
                                                ></a>
                                                <div class="item-name-and-price">
                                                    <span class="item-name">{{ $goods->items()[$i]->name }}</span>
                                                    <span class="item-price">{{ number_format($goods->items()[$i]->price, 0, '', ' ' ) }} руб.</span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 padding0">
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
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding0">
                        <div class="good-container-girl-img">
                            <img src="{{asset('/storage/images/category/girl.jpg')}}" alt="">
                        </div>
                    </div>
                </div>


            </section>
            <section class="good-container-bootom" style="display: flex;">
                <div class="row padding15">
                    @for ($i = 13; $i <= 16; $i++)
                        @if(isset($goods->items()[$i]))
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 padding0">
                                <div class="item">
                                    <img class="item-image-corner" src="{{asset($goods->items()[$i]->getBageSrc())}}" alt="item-corner">
                                    <a href="{{route('product', $goods->items()[$i]->id)}}"><img class="item-image"
                                         @if($goods->items()[$i]->images()->first())
                                         src="{{asset($goods->items()[$i]->images()->first()->name)}}"
                                         @else
                                         src="{{asset('/storage/images/good-image.png')}}"
                                         @endif
                                         alt="good name"
                                    ></a>
                                    <div class="item-name-and-price">
                                        <span class="item-name">{{ $goods->items()[$i]->name }}</span>
                                        <span class="item-price">{{ number_format($goods->items()[$i]->price, 0, '', ' ' ) }} руб.</span>
                                    </div>
                                </div>
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

            </section>
        </div>
        <div class="goods-footer">
            <div class="goods-pagination">
                <span class="pages-span">Страницы:</span>
                {{ $goods->links() }}
            </div>
        </div>
    </div>

@endsection