@extends('layouts.dashboard')
@section('title', 'Номера')
@section('content')
    <a href="{{route('admin.numbers.get')}}" class="btn btn-primary mb-3">Обновить</a>
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
                            <th scope="col">Телефон</th>
                            <th scope="col">Пользователь</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($numbers as $number)
                            <tr>
                                <th scope="row">{{$number->id}}</th>
                                <td>{{$number->number}}</td>
                                <td>{{$number->user->name ?? "-"}}</td>
                                <td>
                                    <a href="{{route('admin.numbers.edit', $number->id)}}" class="btn btn-primary">Изменить</a>
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
