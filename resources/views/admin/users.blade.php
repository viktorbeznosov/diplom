@extends('admin.layout')

@section('content')
    <div class="admin-users">
        <h1>ПОЛЬЗОВАТЕЛИ</h1>
        @if (Session::has('message'))
            <div class="alert alert-primary">
                {{ Session::get('message') }}
            </div>
        @endif
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
                @foreach($users as $user)
                    <tr>
                        <td class="user-name">{{ $user->name }}</td>
                        <td class="user-mail">{{ $user->email }}</td>
                        <td class="user-phone">{{ $user->phone }}</td>
                        <td class="user-show">
                            <a href="{{route('admin.user.show', $user->id)}}">просмотр</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection