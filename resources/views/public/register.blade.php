@extends('public.layout')

@section('content')
    <h1 class="main-header">РЕГИСТРАЦИЯ</h1>
    <div class="register">
        <form action="#" class="" name="registation">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="reg_name">
                        Контактное лицо (ФИО):
                        <input type="text" name="reg_name" id="reg_name">
                    </label>
                    <label for="reg_email">
                        E-mail:
                        <input type="text" name="reg_email" id="reg_email">
                    </label>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="reg_pass">
                        Пароль:
                        <input type="password" name="reg_pass" id="reg_pass">
                    </label>
                    <label for="reg_confirm_pass">
                        Повторить пароль:
                        <input type="password" name="reg_confirm_pass" id="reg_confirm_pass">
                    </label>
                </div>
            </div>
            <input type="submit" value="Зарегистрироваться" class="checkout-regsubmit">
        </form>

    </div>
@endsection