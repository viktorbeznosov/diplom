@extends('admin.layout')

@section('content')
    <div class="admin-cat-item">
        <h1>ПРОСМОТР ТОВАРА</h1>
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <form
            @if($action == 'add')
                action="{{ route('admin.product.add.post') }}"
            @else
                action="{{ route('admin.product.update', $good->id) }}"
            @endif
            enctype="multipart/form-data"
            method="post"
            name="product"
        >
            {{ csrf_field() }}
            <section class="cat-item-info">
                <div class="cat-item-info-header">
                    ИНФОРМАЦИЯ О ТОВАРЕ
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="inner">
                            <label for="cat_item_name">
                                Название товара:
                                <input type="text" name="product_name" id="cat_item_name"
                                    @if($good) value="{{ $good->name }}"@endif
                                >
                            </label>
                            <label for="cat_item_description">
                                Описание товара:
                                <textarea name="product_description" id="cat_item_description">@if($good){{ $good->description }}@endif</textarea>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="inner">
                            <label for="cat_item_price">
                                Цена товара:
                                <input type="text" name="product_price" id="cat_item_price"
                                       @if($good) value="{{ $good->price }}" @endif
                                >
                            </label>
                            <label for="cat_item_old_price">
                                Старая цена:
                                <input type="text" name="product_old_price" id="cat_item_old_price"
                                       @if($good) value="{{ $good->old_price }}" @endif
                                >
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="inner">
                            <span class="badge-header">Бейджик</span>
                            <div class="chech2-radioblock">
                                <input id="badge1" name="hot_new_sale" value="0" type="radio"
                                       @if(!$good || ($good && !$good->hot_new_sale))
                                            checked="checked"
                                       @endif
                                >
                                <label for="badge1">
                                    <div style="display:inline-block">
                                        Отсутствует
                                    </div>
                                </label>
                                <input id="badge2" name="hot_new_sale" value="new" type="radio"
                                     @if($good && $good->hot_new_sale == 'new')
                                          checked="checked"
                                     @endif
                                >
                                <label for="badge2">
                                    <div style="display:inline-block">
                                        NEW
                                    </div>
                                </label>
                                <input id="badge3" name="hot_new_sale" value="hot" type="radio"
                                     @if($good && $good->hot_new_sale == 'hot')
                                          checked="checked"
                                     @endif
                                >
                                <label for="badge3">
                                    <div style="display:inline-block">
                                        HOT
                                    </div>
                                </label>
                                <input id="badge4" name="hot_new_sale" value="sale" type="radio"
                                     @if($good && $good->hot_new_sale == 'sale')
                                            checked="checked"
                                     @endif
                                >
                                <label for="badge4">
                                    <div style="display:inline-block">
                                        SALE
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="cat-item-slider">
                <div class="cat-item-slider-header">
                    <p>ФОТОГРАФИИ ТОВАРА</p>
                    <div class="popular-goods-header-arrows">
                        <div class="arrow arrow-left"></div>
                        <div class="arrow arrow-right"></div>
                    </div>
                </div>
                <div class="cat-items-gallery">
                    <ul id="cat-item-slider-gallery" class="cat-item-slider-gallery">
                        @if($good)
                            @foreach($good->images()->get() as $image)
                                <li>
                                    <div class="item" id="item1">
                                        <img class="item-image" src="{{ asset($image->name)}}" data-src="{{ asset('storage/images/not_loaded.jpg')}}" alt="good name">
                                        <label>
                                            <input type="file"
                                                   id="file{{ $image->id }}"
                                                   name="{{ $image->id }}"
                                                   data-input="{{ $image->id }}"
                                                   onchange="inputChange(this)"
                                                   accept="image/jpeg,image/png">
                                            <span class="item-image-load"> Изменить </span> <br>
                                            <div class="cat-item-slider-actions">
                                                <a class="item-image-delete" href="javascript:void(0)" onclick="inputClear(this)" style="display: block;">Удалить</a>
                                            </div>
                                        </label>

                                    </div>
                                </li>
                            @endforeach
                            <li>
                                <div class="item-add" onclick="slideAdd(this)">
                                    <img class="item-image" src="{{ asset('storage/images/add_slide.png')}}" alt="good name">
                                </div>
                            </li>
                        @else
                            <li>
                                <div class="item" id="item1">
                                    <img class="item-image" src="{{ asset('storage/images/not_loaded.jpg')}}" data-src="{{ asset('storage/images/not_loaded.jpg')}}" alt="good name">
                                    <label>
                                        <input type="file"
                                               id="file1"
                                               name="load_file1"
                                               data-input="1"
                                               onchange="inputChange(this)"
                                               accept="image/jpeg,image/png">
                                        <span class="item-image-load"> Загрузить </span> <br>
                                        <div class="cat-item-slider-actions">
                                            <a class="item-image-delete" href="javascript:void(0)" onclick="inputClear(this)">Удалить</a>
                                        </div>
                                    </label>

                                </div>
                            </li>
                            <li>
                                <div class="item-add" onclick="slideAdd(this)">
                                    <img class="item-image" src="{{ asset('storage/images/add_slide.png')}}" alt="good name">
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </section>
            <section class="cat-item-variants">
                <div class="cat-item-variants-header">
                    ВАРИАНТЫ ТОВАРА
                </div>
                <div class="cat-item-variants-inputs">
                    <div class="row">
                        <div class="col-lg-6 col-md-10 col-sm-12 col-xs-12">
                            <div class="inner">
                                <div class="variant-input">
                                    <input type="text">
                                    <a href="#">Удалить</a>
                                </div>
                                <div class="variant-input">
                                    <input type="text">
                                    <a href="#">Удалить</a>
                                </div>
                                <div class="variant-input">
                                    <input type="text">
                                    <a href="#">Удалить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="cat-item-actions">
                <div class="cat-item-actions-inner" @if($action == 'add') style="justify-content: flex-end;" @endif>
                    @if($action == 'show')
                        <a href="javascript:void(0)" class="cat-item-delete" data-delete="{{ $good->id }}">Удалить товар</a>
                        <input type="hidden" name="images_ids">
                    @endif

                    @if(isset($category_id))
                        <input type="hidden" name="product_category_id" value="{{ $category_id }}">
                    @endif
                    <input class="cat-item-save-input" type="submit" value="Сохранить изменения">
                </div>
            </section>
        </form>
    </div>

    @include('admin.popup', array(
        'header' => 'Вы уверены, что хотите удалить товар?',
        'message' => 'Все товары из этой категории будут удалены из заказов!',
    ))

    <script>
        function inputChange(el) {
            $(el).closest('.item').find('img').attr('src', window.URL.createObjectURL($(el)[0].files[0]));
            $(el).closest('.item').find('span').removeClass('item-image-load').addClass('item-image-change').html('Изменить');
            $(el).closest('.item').find('.item-image-delete').show();
        }

        function inputClear(el) {
            var sldesCount = $('#cat-item-slider-gallery').find('.item').length;
            @if($action == 'add')
                if (sldesCount > 1){
                    $(el).closest('li').remove();
                } else {
                    var imgSrcDefault = $(el).closest('.item').find('img').data('src');
                    var itemId = 'item' + $(el).closest('.item').find('input').data('input');
                    $(el).hide();
                    $(el).closest('.item').find('span').removeClass('item-image-change').addClass('item-image-load').html('Загрузить');
                    $(el).closest('.item').find('img').attr('src', imgSrcDefault);
                    clearFileInputField(itemId);
                }
            @else
                $(el).closest('li').remove();
            @endif
        }

        function clearFileInputField(Id)
        {
            if(document.getElementById(Id)){
                document.getElementById(Id).innerHTML = document.getElementById(Id).innerHTML;
            }
        }

        function slideAdd(el) {
            var lastItemNumber =  $('.item').last().find('input').data('input');
            if (lastItemNumber){
                lastItemNumber++;
            } else {
                lastItemNumber = 1;
            }
            console.log(lastItemNumber)

            $(el).remove();

            $('#cat-item-slider-gallery').append(`
                        <li>
                            <div class="item" id="item`+lastItemNumber+`">
                                <img class="item-image" src="{{ asset('storage/images/not_loaded.jpg')}}" data-src="{{ asset('storage/images/not_loaded.jpg')}}" alt="good name">
                                <label>
                                    <input type="file"
                                           id="file`+lastItemNumber+`"
                                           name="load_file`+lastItemNumber+`"
                                           data-input="`+lastItemNumber+`"
                                           onchange="inputChange(this)"
                                           accept="image/jpeg,image/png">
                                    <span class="item-image-load"> Загрузить </span> <br>
                                    <div class="cat-item-slider-actions">
                                        <a class="item-image-delete" href="javascript:void(0)" onclick="inputClear(this)" style="display:block;">Удалить</a>
                                    </div>
                                </label>

                            </div>
                        </li>

                        <li>
                            <div class="item-add" onclick="slideAdd(this)">
                                <img class="item-image" src="{{ asset('storage/images/add_slide.png')}}" alt="good name">
                              </div>
                        </li>
                `);

            sliderInit();
        }

        function sliderInit(){
            var popular_goods_slider = $("#cat-item-slider-gallery").lightSlider({
                item:4,
                slideMove:1,
                loop:false,
                pager: false,
                responsive : [
                    {
                        breakpoint:1100,
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
        }

        $(function() {
            $('.cat-item-delete').on('click', function () {
                var good_id = $(this).data('delete');
                var action = '/admin/product/delete/' + good_id;
                $('.parent_popup_click').find('form').attr('action',action);
                $('.parent_popup_click').fadeIn(200);
            });

            $('form[name="product"]').on("submit", function () {
                var images = $('input[type="file"]');
                var imagesIds = [];
                if (images.length > 0){
                    $(images).each(function (index, item) {
                        if (parseInt($(item).attr('name')) > 0){
                            imagesIds.push($(item).attr('name'));
                        }
                    });
                    $('input[name="images_ids"]').val(imagesIds);
                }

                var error = false;
                var name = $('input[name="product_name').val();
                var re = /^[0-9]+[.,]?[0-9]*$/;
                var price = $('input[name="product_price').val();
                if (!re.test(price) && price != ''){
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.warning('Цена должна быть числовым значением!');
                    error = true;
                }
                // console.log($('input[name="product_price').val());return  false;

                if (!name || name == ''){
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.warning('Нзавание товара не должно быть пустым!');
                    error = true;
                }


                if (!price || price == ''){
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.warning('Цена товара не должна быть пустой!');
                    error = true;
                }

                if(error){
                    return false;
                }
            });

            sliderInit();
        });
    </script>

    <style>
        .item-image-delete{
            display: none;
        }

        .item input{
            display: none;
        }

        #cat-item-slider-gallery{
            height: 300px!important;
        }
    </style>

@endsection
