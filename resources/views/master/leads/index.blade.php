@extends('layouts.dashboard')
@section('title', 'Лиды')
@section('content')
    <a href="{{route('master.leads.create')}}" class="btn btn-primary mb-3">Добавить</a>
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
                                <td>{{mb_substr($lead->phone,0,10)}}**-**</td>
                                <td>{{$lead->name}}</td>
                                <td>{{$lead->city}}</td>
                                <td><a href="{{route('master.offers.show', $lead->offer->id)}}" target="_blank">{{$lead->offer->name}}</a></td>
                                <td>{{$lead->getStatus()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
