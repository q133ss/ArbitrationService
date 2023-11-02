@extends('layouts.dashboard')
@section('title', 'Звонки')
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
                            <th scope="col">Телефон</th>
                            <th scope="col">Оффер</th>
                            <th scope="col">Продолжительность звонка</th>
                            <th scope="col">Дата и время звонка</th>
                            <th scope="col">Просмотр</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($calls as $call)
                            <tr>
                                <th scope="row">{{$call->id}}</th>
                                <td>{{$call->number_from}}</td>
                                <td><a href="{{route('operator.offer.show', $call->offer_id)}}">{{$call->offer_name}}</a></td>
                                <td>{{$call->duration}}</td>
                                <td>{{\Carbon\Carbon::parse($call->created_at)->format('d.m.Y H:i')}}</td>
                                <td>
                                    <a href="{{route('operator.call.show', $call->id)}}" class="btn btn-primary">Просмотр</a>
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
