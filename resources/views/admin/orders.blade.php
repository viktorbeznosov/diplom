@extends('admin.layout')

@section('content')
    <div class="admin-orders">
        <h1>ЗАКАЗЫ</h1>
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="table-responsive" style="background-color: #fff;">
            <table class="table orders-table">
                <thead>
                <tr>
                    <th>НОМЕР ЗАКАЗА</th>
                    <th>СТАТУС</th>
                    <th>СУММА</th>
                    <th>ВРЕМЯ ЗАКАЗА</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="order-number">
                                <span>№{{ $order->id }}</span>
                                <span>от</span>
                                <span>{{ $order->user->email }}</span>
                            </td>
                            <td class="order-status">
                                <div class="status">
                                    <ul id="my-menu" class="my-menu">
                                        <li>
                                            <a
                                                href="javascript:void(0)"
                                                style="color:{{ $order->status->color }}!important;border-bottom:1px dashed;"
                                                class="order-status-href"
                                                data-id={{ $order->status->id }}
                                            >
                                                {{ $order->status->name }}
                                            </a>
                                            <ul class="order-statuses">
                                                @foreach($statuses as $status)
                                                    @if($order->status->id != $status->id)
                                                        <li>
                                                            <div class="div1">
                                                                <a
                                                                    href="javascript:void(0)"
                                                                    style="color:{{ $status->color }}!important;"
                                                                    data-id={{ $status->id }}
                                                                    data-order_id={{ $order->id }}
                                                                >{{ $status->name }}</a>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td class="order-price">{{ number_format($order->getTotalPrice(), 0, '', ' ' ) }} руб</td>
                            <td class="order-time">{{ $order->getDate() }} от {{ $order->getTime() }}</td>
                            <td class="order-show">
                                <a href="{{route('admin.order.show', $order->id)}}">просмотр</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function getStatusItemIi(item){
            var tpl = `
            <li>
                <div class="div1">
                    <a
                        href="javascript:void(0)"
                        style="color:`+item.color+`!important;"
                        data-id=`+item.id+`
                        data-order_id=`+item.order_id+`
                        >`+item.name+`</a>
                </div>
            </li>
            `;

            return tpl;
        }

        function statusesInit(elem){
            $(elem).on('click', function () {
                var status_id = $(this).data('id');
                var order_id = $(this).data('order_id');
                var data = {
                    'order_id' : order_id,
                    'status_id' : status_id,
                }
                $.ajax({
                    type: "GET",
                    url: '/admin/order/change_status/',
                    data: data,
                    success: (data) => {
                        var response = JSON.parse(data);
                        $(this).closest('ul').slideUp(100);
                        $(this).closest('.my-menu').css({
                            'z-index':0,
                            'border': 'none'
                        });
                        $(this).closest('#my-menu').find('.order-status-href').attr('data-id', response.status.id);
                        $(this).closest('#my-menu').find('.order-status-href').html(response.status.name);
                        $(this).closest('#my-menu').find('.order-status-href').css({
                            'color': response.status.color
                        });

                        var order_statuses = $(this).closest('#my-menu').find('.order-statuses');
                        order_statuses.empty();
                        response.statuses.forEach((item) => {
                            order_statuses.append(getStatusItemIi(item));
                        });
                        statusesInit(order_statuses.find('.div1 a'));

                    }
                });
            });
        }

        $(document).ready(function() {
            $('ul#my-menu ul').each(function(index) {
                $(this).prev().addClass('collapsible').click(function() {
                    var self = $(this)
                    $(this).closest('.my-menu').css({
                        'z-index':10000,
                        'border': '1px solid #c0c0c0'
                    });
                    if ($(this).next().css('display') == 'none') {
                        $(this).next().slideDown(100, function () {
                            $(this).prev().removeClass('collapsed').addClass('expanded');
                        });
                        $('.order-status-href').not($(self)).next().slideUp(100);
                        $('.order-status-href').not($(self)).closest('.my-menu').css({
                            'z-index':0,
                            'border': 'none'
                        });
                    }else {
                        $(this).closest('.my-menu').css({
                            'z-index':0,
                            'border': 'none'
                        });
                        $(this).next().slideUp(100, function () {
                            $(this).prev().removeClass('expanded').addClass('collapsed');
                            $(this).find('ul').each(function() {
                                $(this).hide().prev().removeClass('expanded').addClass('collapsed');
                            });
                        });
                    }
                    return false;
                });
            });

            statusesInit('.div1 a');

        });
    </script>

    <style>
        .my-menu{
            background-color: #fff;
            padding: 0 10px;
        }

        .div1:hover{
            opacity: 0.3;
        }

        .div1{
            transition: all 0.2s;
        }
    </style>
@endsection