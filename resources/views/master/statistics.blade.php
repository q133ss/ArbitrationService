@extends('layouts.dashboard')
@section('title', 'Статистика')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="order-history table-responsive wishlist">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Оффер</th>
                            <th>Звонки</th>
                            <th>Лиды</th>
                            <th>Отказы</th>
                            <th>Прогноз</th>
                            <th>Сумма</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td><a href="{{route('master.offers.show', $item['offer']['id'])}}">{{$item['offer']['name']}}</a></td>
                                <td>{{$item['calls']}}</td>
                                <td>{{$item['leads']}}</td>
                                <td>{{$item['cancels']}}</td>
                                <td>{{$item['hold']}}</td>
                                <td>{{$item['sum']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
