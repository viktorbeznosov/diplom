//Денежный формат числа
priceFormat = function(data){
    /*
     * В переменной price приводим получаемую переменную в нужный вид:
     * 1. принудительно приводим тип в число с плавающей точкой,
     *    учли результат 'NAN' то по умолчанию 0
     * 2. фиксируем, что после точки только в сотых долях
     */
    var fract = (Number.isInteger(data)) ? 0 : 2;

    var price       = Number.prototype.toFixed.call(parseFloat(data) || 0, fract),
        //заменяем точку на запятую
        price_sep   = price.replace(/(\D)/g, ","),
        //добавляем пробел как разделитель в целых
        price_sep   = price_sep.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");

    return price_sep;
};

function addToCart(cartItem){
    var cartItems = (localStorage.getItem('cart')) ? JSON.parse(localStorage.getItem('cart')) : [];
    if (cartItems.length == 0){
        cartItems = {
            total: 1,
            totalPrice: cartItem.price,
            items: [
                {
                    'id': cartItem.id,
                    'name': cartItem.name,
                    'image' : cartItem.image,
                    'price': cartItem.price,
                    'quantity': 1
                }
            ]
        }
        localStorage.setItem('cart', JSON.stringify(cartItems));
    } else {
        var considence = false;
        cartItems.items.forEach(function (item) {
            if (item.id == cartItem.id){
                cartItems.total += 1;
                cartItems.totalPrice +=  cartItem.price;
                item.quantity += 1;
                considence = true;
            }

        });
        if (!considence){
            cartItems.items.push(cartItem);
            cartItems.total += 1;
            cartItems.totalPrice += cartItem.price
        }
        localStorage.setItem('cart', JSON.stringify(cartItems));
    }

    if(cartItems.length != []){
        $('.right-block-cart-price').html(priceFormat(cartItems.totalPrice) + ' руб.');
        $('.right-block-cart-count').html(cartItems.total + ' ' + predmet(cartItems.total));
    } else {
        $('.right-block-cart-price').html('Корзина');
        $('.right-block-cart-count').html('Пуста');
    }
    toastr.options = {
        "closeButton": true
    }
    toastr.success('Товар добавлен');
}

function getCart(){
    var cartItems = (localStorage.getItem('cart')) ? JSON.parse(localStorage.getItem('cart')) : [];
    return cartItems;
}

function  predmet(count) {
    var predmet = '';
    if (count != 11 && (count == 1 || count % 10 == 1)){
        predmet = 'предмет';
    } else if((count >= 2 && count <=4) || (count % 10 >=2 && count % 10 <=4)){
        predmet = 'предмета';
    } else {
        predmet = 'предметов';
    }
    return predmet;
}

function cartInit(){
    var cart = getCart();
    if(cart.length != []){
        $('.right-block-cart-price').html(priceFormat(cart.totalPrice) + ' руб.');
        $('.right-block-cart-count').html(cart.total + ' ' + predmet(cart.total));
    } else {
        $('.right-block-cart-price').html('Корзина');
        $('.right-block-cart-count').html('Пуста');
    }
}

//Remove item from card by html item
function removeFromCart(item){
    item.closest('.order-goods-item').remove();
    var goodId = item.closest('.order-goods-item').data('id');

    var cart = getCart();
    cart.items.forEach(function (item, index) {
        if (item.id == goodId) {
            cart.total -= item.quantity;
            cart.totalPrice -= item.price * item.quantity;
            cart.items.splice(index, 1);
        }
    });
    localStorage.setItem('cart', JSON.stringify(cart));
    if (cart.items.length == 0){
        localStorage.clear();
        $('.right-block-cart-price').html('Корзина');
        $('.right-block-cart-count').html('Пуста');
        $('.order-confirm .result').find('span:last-child').html('');
        $('.order-confirm').hide();
    } else {
        $('.right-block-cart-price').html(cart.totalPrice + ' руб.');
        $('.right-block-cart-count').html(cart.total + ' ' + predmet(cart.total));
        $('.order-confirm .result').find('span:last-child').html(cart.totalPrice + ' руб.');
    }
}

//Decreese good quantity in cart
function cartItemDec(item){
    var count = item.closest('.good-quantity').find('.quantity-operate-count').val();
    if (count > 1){
        var goodId = item.closest('.order-goods-item').data('id');

        //Dec item quantity
        var cart = getCart();
        var self = item;
        cart.items.forEach(function (item, index) {
            if (item.id == goodId) {
                cart.total -= 1;
                cart.totalPrice -= item.price;
                item.quantity -= 1;
                self.closest('.order-goods-item').find('.good-result').html('').html(priceFormat(item.price * item.quantity) + ' руб');
            }
        });
        localStorage.setItem('cart', JSON.stringify(cart));
        $('.right-block-cart-price').html(priceFormat(cart.totalPrice) + ' руб.');
        $('.right-block-cart-count').html(cart.total + ' ' + predmet(cart.total));

        count--;
        item.closest('.good-quantity').find('.quantity-operate-count').val(count);
        $('.order-confirm .result').find('span:last-child').html(priceFormat(cart.totalPrice) + ' руб.');
    }
}

function cartItemInc(item){
    var count = item.closest('.good-quantity').find('.quantity-operate-count').val();
    var goodId = item.closest('.order-goods-item').data('id');

    //Inc item quantity
    var cart = getCart();
    var self = item;
    cart.items.forEach(function (item, index) {
        if (item.id == goodId) {
            cart.total += 1;
            cart.totalPrice += item.price;
            item.quantity += 1;
            self.closest('.order-goods-item').find('.good-result').html('').html(priceFormat(item.price * item.quantity) + ' руб');
        }
    });
    localStorage.setItem('cart', JSON.stringify(cart));
    $('.right-block-cart-price').html(priceFormat(cart.totalPrice) + ' руб.');
    $('.right-block-cart-count').html(cart.total + ' ' + predmet(cart.total));

    count++;
    item.closest('.good-quantity').find('.quantity-operate-count').val(count);
    $('.order-confirm .result').find('span:last-child').html(priceFormat(cart.totalPrice) + ' руб.');
}

$(document).ready(function() {
    var pull = $('#pull');
    var menu = $('nav ul');
    var menuHeight = menu.height();

    $(pull).on('click', function(e) {
        e.preventDefault();
        menu.slideToggle();
    });

    $('.product-item-thimb .lightBox').lightBox();

    $('#ProductGallery').lightSlider({
        gallery: true,
        item: 1,
        thumbItem: 4,
        // thumbMargin: 50,
        loop: true,
        slideMargin: 0,
        enableDrag: false,
        currentPagerPosition:'middle',
        responsive : [
            {
                breakpoint:768,
                settings: {
                    thumbItem:2
                }
            },
            {
                breakpoint:575,
                settings: {
                    thumbItem:3
                }
            },
            {
                breakpoint:426,
                settings: {
                    thumbItem: 1
                }
            }
        ],
        onSliderLoad: function(el) {
            // $('#ProductGallery').closest('.lSSlideWrapper').next().find('li').css({
            //     'width':'60px',
            // });
            // $('#ProductGallery').closest('.lSSlideWrapper').next().find('li[class="active"]').css({
            //     'margin-left':'60px'
            // });
        }
    });

    $('#SliderDetailsBtnLeft').on('click', function(){
        $('#ProductGallery').next().find('.lSPrev').click();
    });

    $('#SliderDetailsBtnRight').on('click', function(){
        $('#ProductGallery').next().find('.lSNext').click();
    });
});
