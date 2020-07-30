@extends('admin.layout')

@section('content')
    <div class="admin-user">
        <h1>ПРОСМОТР ПОЛЬЗОВАТЕЛЯ</h1>
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <form action="{{ route('admin.user.update', $user->id) }}" name="user" method="post">
            {{ csrf_field() }}
            <section class="users-user-info">
                <div class="users-user-info-header">
                    ИНФОРМАЦИЯ О ПОЛЬЗОВАТЕЛЕ
                </div>
                <div class="users-user-info-content">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="inner">
                                <label for="user_name">
                                    Контактное лицо (ФИО):
                                    <input type="text" name="user_name" id="user_name" value="{{ $user->name }}">
                                </label>
                                <label for="user_phone">
                                    Контактный телефон:
                                    <input type="text" name="user_phone" id="user_phone" value="{{ $user->phone }}">
                                </label>
                                <label for="user_email">
                                    E-mail:
                                    <input type="text" name="user_email" id="user_email" value="{{ $user->email }}">
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="inner">
                                <label for="user_state">
                                    Город:
                                    <input type="text" name="user_state" id="user_state" value="{{ $user->state }}">
                                </label>
                                <label for="user_street">
                                    Улица:
                                    <input type="text" name="user_street" id="user_street" value="{{ $user->flat }}">
                                </label>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="user_house">
                                            Дом:
                                            <input type="text" name="user_house" id="user_house" value="{{ $user->house }}">
                                        </label>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <label for="user_flat">
                                            Квартира:
                                            <input type="text" name="user_flat" id="user_flat" value="{{ $user->flat }}">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="users-user-orders">
                <div class="table-responsive" style="background-color: #fff;">
                    <table class="table user-orders-table">
                        <thead>
                        <tr>
                            <th>ИСТОРИЯ ЗАКАЗОВ</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->orders()->get() as $order)
                            <tr>
                                <td class="order-number">
                                    <span>№ {{ $order->id }}</span>
                                </td>
                                <td class="order-cost">
                                    <span>{{ number_format($order->getTotalPrice(), 0, '', ' ' ) }} руб.</span>
                                </td>
                                <td class="order-date">
                                    <span>{{ $order->getDate() }} в {{ $order->getTime() }}</span>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="order-result">
                                <div class="order-result-inner">
                                    <span>Итоговая сумма заказов</span>
                                    <span>{{ number_format($user->getTotalPrice(), 0, '', ' ' ) }} руб.</span>
                                </div>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </section>
            <div class="user-delete">
                <span id="user-delete" data-delete="{{ $user->id }}">Удалить пользователя</span>
                <input type="submit" value="Сохранить изменения">
            </div>
        </form>
    </div>

    @include('admin.popup', array(
        'header' => 'Вы уверены, что хотите удалить пользователя?',
        'message' => 'Все заказы пользователя будут удалены!',
    ))

    <script>
        $( document ).ready(function() {
            $('#user-delete').on('click', function () {
                var user_id = $(this).data('delete');
                var action = '/admin/user/delete/' + user_id;
                $('.parent_popup_click').find('form').attr('action',action);
                $('.parent_popup_click').fadeIn(200);
            });

            $('form[name="user"]').on("submit", function () {
                var error = false;
                var name = $('input[name="user_name').val();
                var email = $('input[name="user_email').val();
                var phone = $('input[name="user_phone').val();

                var re = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;
                if (!re.test(email) && email != ''){
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.warning('Введите email в определенном формате!');
                    error = true;
                }

                if (!name || name == ''){
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.warning('Имя пользователя не должно быть пустым!');
                    error = true;
                }

                if (!email || email == ''){
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.warning('Email не дожен быть пустым!');
                    error = true;
                }

                if(error){
                    return false;
                }
            });
        });

    </script>
@endsection