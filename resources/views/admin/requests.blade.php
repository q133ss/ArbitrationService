@extends('layouts.dashboard')
@section('title', 'Заявки')
@section('content')
<div class="card">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card-block row">
        <div class="col-sm-12 col-lg-12 col-xl-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Пользователь</th>
                        <th scope="col">Оффер</th>
                        <th scope="col">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($offers as $offer)
                    <tr>
                        <th scope="row">{{$offer->id}}</th>
                        <td>
                            <a href="{{route('admin.users.edit', $offer->user->id)}}" target="_blank">{{$offer->user->name}}</a>
                        </td>
                        <td>{{$offer->offer->name}}</td>
                        <td>
                            <a href="{{route('admin.requests.action', ['approved', $offer->id])}}" class="btn btn-info">Подтвердить</a>
                            <a href="{{route('admin.requests.action', ['canceled', $offer->id])}}" class="btn btn-danger">Х</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
