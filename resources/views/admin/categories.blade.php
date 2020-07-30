@extends('admin.layout')

@section('content')
    <div class="admin-categories">
        <h1>КАТЕГОРИИ</h1>
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
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
                @foreach($categories as $catgory)
                    <tr>
                        <td class="category-name">{{$catgory->name}}</td>
                        <td class="category-quantity">{{ count($catgory->goods) }}</td>
                        <td class="category-actions">
                            <a href="javascript:void(0)" class="category-delete" data-delete="{{ $catgory->id }}">удалить</a>
                            <a href="{{route('admin.category.show', $catgory->id)}}">просмотр</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="add-category-wrapper">
            <div class="add-category">
                <form action="{{ route('admin.category.add') }}" name="add_category" method="post">
                    {{ csrf_field() }}
                    <label for="add-category-input">
                        Добавить категорию
                        <input type="text" id="add-category-input" name="category_name">
                    </label>
                    <input type="submit" value="Добавить категорию">
                </form>

            </div>

        </div>

        @if(count($errors) > 0)
            <div class="alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
    </div>

    @include('admin.popup', array(
        'header' => 'Вы уверены, что хотите удалить категорию?',
        'message' => 'Все товары из этой категории будут удалены из заказов!',
    ))


    <script>
        $(document).ready(function () {
            $('form[name="add_category"]').on('submit', function () {
                var category_name = $('#add-category-input').val();
                if (!category_name || category_name == ''){
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.warning('Нзавание категории не должно быть пустым!');
                    return false;
                }
            });

            $('.popup_cancel, .popup_close').on('click', function () {
                $(this).closest('.parent_popup_click').fadeOut(200);
            });

            $('.category-delete').on('click', function () {
                var category_id = $(this).data('delete');
                var action = '/admin/category/delete/' + category_id;
                $('.parent_popup_click').find('form').attr('action',action);
                $('.parent_popup_click').fadeIn(200);
            })
        });
    </script>
@endsection