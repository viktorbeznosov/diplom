@extends('admin.layout')

@section('content')
    <div class="admin-category">
        <h1>ТОВАРЫ</h1>
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="current-category">
            <form method="post" action="{{ route('admin.category.update', $category->id) }}" name="category-rename">
                {{ csrf_field() }}
                <label for="current-category-name">
                    Текущая категория:
                    <input type="text" id="current-category-name" name="category_name" value="{{ $category->name }}">
                    <input type="submit" value="переименовать">
                </label>
            </form>
        </div>
        <section class="admin-category-goods">
            <div class="table-responsive" style="background-color: #fff;">
                <table class="table category-goods-table">
                    <table class="table goods-table">
                        <thead>
                        <tr>
                            <th>НАЗВАНИЕ</th>
                            <th>СТОИМОСТЬ</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($goods as $good)
                                <tr>
                                    <td class="good-name">{{ $good->name }}</td>
                                    <td class="good-price">{{ number_format($good->price, 0, '', ' ' ) }} руб.</td>
                                    <td class="good-show">
                                        <a href="{{route('admin.product.show', $good->id)}}">просмотр</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </table>
            </div>
        </section>
        <div class="good-add">
            <a href="{{ route('admin.product.add', $category->id) }}">Добавить товар</a>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            @if(isset($_POST))
                $('form[name="category-rename"]').trigger("reset");
            @endif

            $('form[name="category-rename"]').on('submit', function () {
                var category_name = $('#current-category-name').val();
                if (!category_name || category_name == ''){
                    toastr.options = {
                        "closeButton": true
                    }
                    toastr.warning('Нзавание категории не должно быть пустым!');
                    return false;
                }
            });
        })
    </script>
@endsection
