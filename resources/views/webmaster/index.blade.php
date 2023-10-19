@extends('layouts.dashboard')
@section('title', 'Главная')
@section('content')
    <div class="card">
        @include('webmaster.inc.statistic.nav')
        <hr>

        @php
            $offers = Auth()->User()->offers();
        @endphp

        <div class="d-flex gap-2 p-2">
            <input class="datepicker-here form-control digits w-25" type="text" data-range="true" data-multiple-dates-separator=" - " data-language="ru">

{{--            <div class="btn-group">--}}
{{--                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Направления</button>--}}
{{--                <ul class="dropdown-menu dropdown-block" style="">--}}
{{--                    <li><a class="dropdown-item" href="#">Project</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#">Ecommerce</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#">Crypto</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

            <div class="btn-group">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Офферы</button>
                <ul class="dropdown-menu dropdown-block" style="">
                    <li><a class="dropdown-item" href="#">Offer1</a></li>
                </ul>
            </div>

            <div class="btn-group">

                <button class="btn btn-primary dropdown-toggle show" type="button" data-bs-toggle="dropdown" aria-expanded="true" data-bs-auto-close="outside">Города</button>
                <form class="dropdown-menu p-4 form-wrapper dark-form" data-popper-placement="top-start">
                    <input class="form-control" id="exampleDropdownFormEmail2" type="text" placeholder="">
                    <div class="cities p-0">
                        <a href="#" class="dropdown-item">Москва</a>
                        <a href="#" class="dropdown-item">Воронеж</a>
                        <a href="#" class="dropdown-item">Санкт-Питербург</a>
                    </div>
                </form>
            </div>

            <button class="btn btn-primary">Применить</button>
        </div>
    </div>

    @php
    $data = [
        [
        'calls' => 45,
        'lead_all' => 1,
        'lead_form' => 0,
        'lead_calls' => 1,

        'conv_all' => 2,
        'conv_form' => 0,
        'conv_calls' => 1,
        'conv_true' => 1,
        'conv_wait' => 0,
        'conv_trash' => 0,

        'fin_all' => 950,
        'fin_paid' => 0,
        'fin_forecast' => 950
        ],
        [
        'calls' => 25,
        'lead_all' => 1,
        'lead_form' => 0,
        'lead_calls' => 1,

        'conv_all' => 2,
        'conv_form' => 0,
        'conv_calls' => 1,
        'conv_true' => 1,
        'conv_wait' => 0,
        'conv_trash' => 0,

        'fin_all' => 550,
        'fin_paid' => 0,
        'fin_forecast' => 550
        ],
        [
        'calls' => 5,
        'lead_all' => 1,
        'lead_form' => 0,
        'lead_calls' => 1,

        'conv_all' => 2,
        'conv_form' => 0,
        'conv_calls' => 1,
        'conv_true' => 1,
        'conv_wait' => 0,
        'conv_trash' => 0,

        'fin_all' => 350,
        'fin_paid' => 0,
        'fin_forecast' => 350
        ]
    ];
    @endphp

    <div class="card">
        <div class="table-responsive signal-table p-2">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">Трафик</th>
                    <th scope="col" colspan="3">Лиды</th>
                    <th scope="col" colspan="6">Конверсии</th>
                    <th scope="col" colspan="3">Финансы</th>
                </tr>
                <tr>
                    <th scope="col">Звонки</th>
                    <th scope="col">Всего</th>
                    <th scope="col">Формы</th>
                    <th scope="col">Звонки</th>
                    <th scope="col">Всего</th>
                    <th scope="col">Формы</th>
                    <th scope="col">Звонки</th>

                    <th scope="col">true</th>
                    <th scope="col">wait</th>
                    <th scope="col">trash</th>

                    <th scope="col">Всего</th>
                    <th scope="col">Выплачено</th>
                    <th scope="col">Прогноз</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                <tr>
                    <th scope="row">{{$row['calls']}}</th>
                    <td>{{$row['lead_all']}}</td>
                    <td>{{$row['lead_form']}}</td>
                    <td>{{$row['lead_calls']}}</td>
                    <td>{{$row['conv_all']}}</td>
                    <td>{{$row['conv_form']}}</td>
                    <td>{{$row['conv_calls']}}</td>
                    <td>{{$row['conv_true']}}</td>
                    <td>{{$row['conv_wait']}}</td>
                    <td>{{$row['conv_trash']}}</td>
                    <td>{{$row['fin_all']}}</td>
                    <td>{{$row['fin_paid']}}</td>
                    <td>{{$row['fin_forecast']}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
