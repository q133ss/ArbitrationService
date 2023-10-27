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
                            <th scope="col">Длительность звонка</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($calls as $call)
                            <tr>
                                <th scope="row">{{$call->id}}</th>
                                <td>{{$call->number_from}}</td>
                                <td>{{$call->duration}}</td>
                                <td>
                                    <a href="{{route('adv.lead.show', $call->id)}}" class="btn btn-primary">Подтвердить заявку</a>
                                    <a href="{{route('adv.lead.show', $call->id)}}" class="btn btn-primary">Отклонить заявку</a>
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
