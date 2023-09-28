@extends('layouts.dashboard')
@section('title', 'Офферы')
@section('content')
    <a href="{{route('admin.offers.create')}}" class="btn btn-primary mb-3">Добавить</a>
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
                            <th scope="col">Название</th>
                            <th scope="col">Рекламодатель</th>
                            <th scope="col">Дата создания</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $offer)
                            <tr>
                                <th scope="row">{{$offer->id}}</th>
                                <td>{{$offer->name}}</td>
                                <td><a href="{{route('admin.users.edit', $offer->advertiser->id)}}">{{$offer->advertiser->name}}</a></td>
                                <td>{{\Carbon\Carbon::parse($offer->created_at)->format('d.m.Y')}}</td>
                                <td>
                                    <a href="{{route('admin.offers.edit', $offer->id)}}" class="btn btn-primary">Изменить</a>
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
