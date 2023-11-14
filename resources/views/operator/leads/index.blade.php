@extends('layouts.dashboard')
@section('title', $name)
@section('content')
    <a href="{{route('operator.lead.create')}}" class="btn btn-primary mb-2">Добавить лид</a>
    <div class="card">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card-block row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                    @if(!isset($approved))
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Город</th>
                            <th scope="col">Оффер</th>
                            <th scope="col">Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leads as $lead)
                            <tr>
                                <th scope="row">{{$lead->id}}</th>
                                <td>{{$lead->phone}}</td>
                                <td>{{$lead->name}}</td>
                                <td>{{$lead->city}}</td>
                                <td>{{$lead->offer->name}}</td>
                                <td>{{$lead->getStatus()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Город</th>
                                <th scope="col">Оффер</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leads as $lead)
                                <tr>
                                    <th scope="row">{{$lead->id}}</th>
                                    <td>{{$lead->phone}}</td>
                                    <td>{{$lead->name}}</td>
                                    <td>{{$lead->city}}</td>
                                    <td>{{$lead->offer->name}}</td>
                                    <td>{{$lead->getStatus()}}</td>
                                    <td>
                                        <a href="{{route('operator.leads.action', [$lead->id, true])}}" class="text-primary">Подтвердить</a>
                                        <a href="{{route('operator.leads.action', [$lead->id, 0])}}" class="text-danger">Отклонить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
