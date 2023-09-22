@extends('layouts.dashboard')
@section('title', 'Пользователи')
@section('content')
    <a href="{{route('admin.users.create')}}" class="btn btn-primary mb-3">Добавить</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Роль</th>
                <th scope="col">Дата регистрации</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr @if($user->confirmed == false) class="bg-warning" @endif>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}} @if($user->confirmed == false)<strong>(Не подтвержден)</strong>@endif</td>
                <td>{{$user->role->name}}</td>
                <td>{{\Carbon\Carbon::parse($user->created_at)->format('d.m.Y')}}</td>
                <td>
                    <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary">Изменить</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
