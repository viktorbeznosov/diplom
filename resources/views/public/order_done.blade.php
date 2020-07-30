@extends('public.layout')

@section('content')
<h1 class="main-header">ОФОРМЛЕНИЕ ЗАКАЗА</h1>
<div class="order-done">
    <div class="order-done-header">
        <span>Заказ {{ $order_id }}</span>
        <span>успешно оформлен</span>
    </div>
    <p>Спасибо за ваш заказ</p>
    <p>В ближайшее время с вами свяжется оператор для уточнения времени доставки</p>
    <a href="{{route('home')}}" class="order-done-back">Вернуться в магазин</a>
</div>
@endsection