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

                            <th scope="col">Имя клиента</th>
                            <th scope="col">Город клиента</th>
                            <th scope="col">Адрес</th>
                            <th scope="col">Дата и время встречи</th>
                            <th scope="col">Комментарий оператора</th>

                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($calls as $call)
                            <tr>
                                <th scope="row">{{$call->id}}</th>
                                <td>{{$call->number_from}}</td>
                                <td>{{$call->duration}}</td>
                                <td>{{$call->name}}</td>
                                <td>{{$call->city}}</td>
                                <td>{{$call->address}}</td>
                                <td>{{\Carbon\Carbon::parse($call->date)->format('d-m-Y')}} в {{\Carbon\Carbon::parse($call->time)->format('H:i')}}</td>
                                <td>{{$call->comment}}</td>
                                <td>
                                    <a href="{{route('adv.calls.action', [$call->id, 1])}}" class="btn conf btn-primary">Подтвердить заявку</a>
                                    <a href="{{route('adv.calls.action', [$call->id, 0])}}" class="btn conf btn-primary">Отклонить заявку</a>
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
@section('scripts')
    <script>
        $('.conf').click(function(){
            let conf = confirm();
            if(!conf){
                return false;
            }
        })
    </script>
@endsection
