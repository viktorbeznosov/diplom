@extends('admin.layout')

@section('content')
    <div class="admin-order">
        <h1>ЗАКАЗ
            <span class="admin-order-header-number">№{{ $order->id }}</span>
            <span class="admin-order-header-status" style="color:{{ $order->status->color }};">({{ $order->status->name }})</span>
        </h1>
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <section class="order-orders-table">
            <div class="table-responsive" style="background-color: #fff;">
                <table class="table orders-table">
                    <thead>
                    <tr>
                        <th>СОДЕРЖИМОЕ ЗАКАЗА</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($order->goods()->get() as $good)
                            <tr>
                                <td class="order-good-name">
                                    <span>{{ $good->name }}</span>
                                </td>
                                <td class="order-good-price">
                                    <span>{{ number_format($good->price, 0, '', ' ' ) }} руб.</span>
                                </td>
                                <td class="order-good-quantity">
                                    <div>{{ $good->pivot->quantity }}</div>
                                </td>
                                <td class="order-good-result">
                                    <span>{{ number_format($good->price * $good->pivot->quantity, 0, '', ' ' ) }} руб.</span>
                                </td>
                                <td class="order-good-detete">
                                    <a href="javascript:void(0)" data-delete="{{ $good->pivot->id }}">убрать из заказа</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <section class="order-order-info">
            <div class="order-order-info-header">
                ИНФОРМАЦИЯ О ЗАКАЗЕ
            </div>
            <div class="order-info-content">
                <div class="row">
                    <div class="col-lg4 col-md-4 col-sm-6 col-xs-12">
                        <div class="inner">
                            <label for="order_name">
                                Контактное лицо (ФИО):
                                <input type="text" name="order_name" id="order_name" disabled value="{{ $order->user->name }}">
                            </label>
                            <label for="order_phone">
                                Контактный телефон:
                                <input type="text" name="order_phone" id="order_phone" disabled value="{{ $order->user->phone }}">
                            </label>
                            <label for="order_email">
                                E-mail:
                                <input type="text" name="order_email" id="order_email" disabled value="{{ $order->user->email }}">
                            </label>
                        </div>
                    </div>
                    <div class="col-lg4 col-md-4 col-sm-6 col-xs-12">
                        <div class="inner">
                            <label for="order_state">
                                Город:
                                <input type="text" name="order_state" id="order_state" disabled value="{{ $order->state }}">
                            </label>
                            <label for="order_flat">
                                Улица:
                                <input type="text" name="order_flat" id="order_flat" disabled value="{{ $order->street }}">
                            </label>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="order_house">
                                        Дом:
                                        <input type="text" name="order_house" id="order_house" disabled value="{{ $order->house }}">
                                    </label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="order_house">
                                        Квартира:
                                        <input type="text" name="order_house" id="order_house" disabled value="{{ $order->flat }}">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg4 col-md-4 col-sm-12 col-xs-12">
                        <div class="inner">
                            <label for="order_delivery_type">
                                Способ доставки:
                                <textarea name="order_delivery_type" id="order_delivery_type" cols="30" rows="10" disabled>{{ $order->destination->name }}</textarea>
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="inner">
                            <label for="order_comment">
                                Коментарий к заказу:
                                <textarea name="order_comment" id="order_comment" cols="30" rows="10" disabled>{{ $order->comment }}</textarea>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="order-cansel">
            <a href="javascript:void(0)" data-delete="{{ $order->id }}">Удалить заказ</a>
        </div>

    </div>

    @if(count($order->goods()->get()) > 1)
        @include('admin.popup', array(
             'id' => 'order_good_delete',
             'header' => 'Вы уверены, что хотите удалить товар из заказа?',
             'message' => ''
         ))
    @else
        @include('admin.popup', array(
            'id' => 'order_good_delete',
            'header' => 'Вы уверены, что хотите удалить последний товар из заказа?',
            'message' => ''
        ))
    @endif

    @include('admin.popup', array(
         'id' => 'order_delete',
         'header' => 'Вы уверены, что хотите удалить заказ?',
         'message' => ''
     ))



    <script>
        $(document).ready(function () {
            $('.order-good-detete').on('click', function () {
                var order_good_id = $(this).find('a').data('delete');
                var action = '/admin/order/good/delete/' + order_good_id;
                $('#order_good_delete').find('form').attr('action',action);
                $('#order_good_delete').fadeIn(200);
            });

            $('.order-cansel a').on('click', function () {
                var order_id = $(this).data('delete');
                var action = '/admin/order/delete/' + order_id;
                $('#order_delete').find('form').attr('action',action);
                $('#order_delete').fadeIn(200);
            });
        })
    </script>
@endsection