@extends('admin.layout')

@section('content')
    <div class="admin-orders">
        <h1>ЗАКАЗЫ</h1>
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
                <tr>
                    <td class="order-number">
                        <span>№2222</span>
                        <span>от</span>
                        <span>vb@webisgroup.ru</span>
                    </td>
                    <td class="order-status">
                        <div class="status">
                            <ul id="my-menu">
                                <li><a href="#" style="color:#1ba254;
																border-bottom:1px dashed;">отгружен</a>
                                    <ul>
                                        <li><div class="div1"><a href="#" style="color:#0a8eaf;">принят</a></div></li>
                                        <li><div class="div1"><a href="#" style="color:#1ba254;">отгружен</a></div></li>
                                        <li><div class="div1"><a href="#" style="color:#ad5a00;">у курьера</a></div></li>
                                        <li><div class="div1"><a href="#" style="color:#a01ba2;">доставлен</a></div></li>
                                        <li><div class="div1"><a href="#" style="color:#6c6c6c;">отмена</a></div></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td class="order-price">4 550 руб</td>
                    <td class="order-time">01.01.2020 от 21:00</td>
                    <td class="order-show">
                        <a href="{{route('admin.order.show', 1)}}">просмотр</a>
                    </td>
                </tr>
                <tr>
                    <td class="order-number">
                        <span>№2223</span>
                        <span>от</span>
                        <span>vb@webisgroup.ru</span>
                    </td>
                    <td class="order-status">
                        <div class="status">
                            <ul id="my-menu">
                                <li><a href="#" style="color:#1ba254;
																border-bottom:1px dashed;">отгружен</a>
                                    <ul>
                                        <li><div class="div1"><a href="#" style="color:#0a8eaf;">принят</a></div></li>
                                        <li><div class="div1"><a href="#" style="color:#1ba254;">отгружен</a></div></li>
                                        <li><div class="div1"><a href="#" style="color:#ad5a00;">у курьера</a></div></li>
                                        <li><div class="div1"><a href="#" style="color:#a01ba2;">доставлен</a></div></li>
                                        <li><div class="div1"><a href="#" style="color:#6c6c6c;">отмена</a></div></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td class="order-price">9 100 руб</td>
                    <td class="order-time">01.01.2020 от 21:00</td>
                    <td class="order-show">
                        <a href="{{route('admin.order.show', 2)}}">просмотр</a>
                    </td>
                </tr>
                <tr>
                    <td class="order-number">
                        <span>№2224</span>
                        <span>от</span>
                        <span>vb@webisgroup.ru</span>
                    </td>
                    <td class="order-status">
                        <div class="status">
                            <ul id="my-menu">
                                <li><a href="#" style="color:#1ba254;
																border-bottom:1px dashed;">отгружен</a>
                                    <ul>
                                        <li><div class="div1"><a href="#" style="color:#0a8eaf;">принят</a></div></li>
                                        <li><div class="div1"><a href="#" style="color:#1ba254;">отгружен</a></div></li>
                                        <li><div class="div1"><a href="#" style="color:#ad5a00;">у курьера</a></div></li>
                                        <li><div class="div1"><a href="#" style="color:#a01ba2;">доставлен</a></div></li>
                                        <li><div class="div1"><a href="#" style="color:#6c6c6c;">отмена</a></div></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td class="order-price">45 500 руб</td>
                    <td class="order-time">01.01.2020 от 21:00</td>
                    <td class="order-show">
                        <a href="{{route('admin.order.show', 3)}}">просмотр</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="admin-users">
        <h1>ПОЛЬЗОВАТЕЛИ</h1>
        <div class="table-responsive" style="background-color: #fff;">
            <table class="table users-table">
                <thead>
                <tr>
                    <th>ИМЯ</th>
                    <th>E-MAIL</th>
                    <th>ТЕЛЕФОН</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="user-name">Иван Иванов</td>
                    <td class="user-mail">mail@company.ru</td>
                    <td class="user-phone">+7 926 000-00-00</td>
                    <td class="user-show">
                        <a href="{{route('admin.user.show', 1)}}">просмотр</a>
                    </td>
                </tr>
                <tr>
                    <td class="user-name">Иван Иванов</td>
                    <td class="user-mail">mail@company.ru</td>
                    <td class="user-phone">+7 926 000-00-00</td>
                    <td class="user-show">
                        <a href="{{route('admin.user.show', 2)}}">просмотр</a>
                    </td>
                </tr>
                <tr>
                    <td class="user-name">Иван Иванов</td>
                    <td class="user-mail">mail@company.ru</td>
                    <td class="user-phone">+7 926 000-00-00</td>
                    <td class="user-show">
                        <a href="{{route('admin.user.show', 3)}}">просмотр</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="admin-categories">
        <h1>КАТЕГОРИИ</h1>
        <div class="table-responsive" style="background-color: #fff;">
            <table class="table categories-table">
                <thead>
                <tr>
                    <th>НАЗВАНИЕ КАТЕГОРИИ</th>
                    <th>КОЛИЧЕСТВО ТОВАРОВ</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="category-name">Название категории 1</td>
                    <td class="category-quantity">20</td>
                    <td class="category-actions">
                        <a href="#">удалить</a>
                        <a href="{{route('admin.category.show', 1)}}">просмотр</a>
                    </td>
                </tr>
                <tr>
                    <td class="category-name">Название категории 2</td>
                    <td class="category-quantity">50</td>
                    <td class="category-actions">
                        <a href="#">удалить</a>
                        <a href="{{route('admin.category.show', 2)}}">просмотр</a>
                    </td>
                </tr>
                <tr>
                    <td class="category-name">Название категории 3</td>
                    <td class="category-quantity">100</td>
                    <td class="category-actions">
                        <a href="#">удалить</a>
                        <a href="{{route('admin.category.show', 3)}}">просмотр</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="add-category-wrapper">
            <div class="add-category">
                <form action="#" name="add_category">
                    <label for="add-category-input">
                        Добавить категорию
                        <input type="text" id="add-category-input" name="category_name">
                    </label>
                    <input type="submit" value="Добавить категорию">
                </form>

            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('ul#my-menu ul').each(function(index) {
                $(this).prev().addClass('collapsible').click(function() {
                    if ($(this).next().css('display') == 'none') {
                        $(this).next().slideDown(100, function () {
                            $(this).prev().removeClass('collapsed').addClass('expanded');
                        });
                    }else {
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
        });
    </script>

@endsection