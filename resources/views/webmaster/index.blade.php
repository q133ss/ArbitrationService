@extends('layouts.dashboard')
@section('title', 'Главная')
@section('content')
{{--    <div class="card">--}}
    <div class="card">
        @include('webmaster.inc.statistic.nav')
        <hr>

        <form action="{{route('dashboard')}}" method="GET" id="submitForm">
            <input type="hidden" name="offer_id" id="offer_id">
            <input type="hidden" name="city" id="city">
            <input type="hidden" name="dates" id="dates">
        </form>

        <div class="d-flex gap-2 p-2">
            <input class="datepicker-here form-control digits w-25 dates_inp" value="{{\Request()->dates}}" type="text" data-range="true" data-multiple-dates-separator=" - " data-language="ru">

{{--            <div class="btn-group">--}}
{{--                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Направления</button>--}}
{{--                <ul class="dropdown-menu dropdown-block" style="">--}}
{{--                    <li><a class="dropdown-item" href="#">Project</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#">Ecommerce</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#">Crypto</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

            <div class="btn-group">
{{--                offer_id--}}
                <button class="btn btn-primary dropdown-toggle" type="button" id="offerSelect" data-bs-toggle="dropdown" aria-expanded="false">@if(\Request()->offer_id) {{$offers->where('id', \Request()->offer_id)->pluck('name')->first()}} @elseОфферы@endif</button>
                <ul class="dropdown-menu dropdown-block" style="">
                    <li><a class="dropdown-item offer_item" href="#" data-id="">Офферы</a></li>
                    @foreach($offers as $offer)
                    <li><a class="dropdown-item offer_item" href="#" data-id="{{$offer->id}}">{{$offer->name}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="btn-group">

                <button class="btn btn-primary dropdown-toggle show" id="cityBtn" type="button" data-bs-toggle="dropdown" aria-expanded="true" data-bs-auto-close="outside">@if(\Request()->city) {{\Request()->city}} @elseГорода@endif</button>
                <form class="dropdown-menu p-4 form-wrapper dark-form" data-popper-placement="top-start">
{{--                    <input class="form-control" name="city" id="exampleDropdownFormEmail2" type="text" placeholder="">--}}
                    <div class="cities p-0">
                        <a href="#" class="dropdown-item city_item">Города</a>
                        @foreach($cities as $city)
                        <a href="#" class="dropdown-item city_item">{{$city}}</a>
                        @endforeach
                    </div>
                </form>
            </div>

            <button class="btn btn-primary" type="button" onclick="send()">Применить</button>
        </div>


    </div>



    <div class="card">
        <div class="table-responsive signal-table p-2">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">Дата</th>
                    <th scope="col">Трафик</th>
                    <th scope="col" colspan="3">Лиды</th>
                    <th scope="col" colspan="6">Конверсии</th>
                    <th scope="col" colspan="3">Финансы</th>
                </tr>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Звонки</th>
                    <th scope="col">Всего</th>
                    <th scope="col">Формы</th>
                    <th scope="col">Звонки</th>
                    <th scope="col">Всего</th>
                    <th scope="col">Формы</th>
                    <th scope="col">Звонки</th>

                    <th scope="col">
                        <i class="icon-check-box"></i>
                    </th>
                    <th scope="col">
                        <i class="icon-timer"></i>
                    </th>
                    <th scope="col">
                        <i class="icon-trash"></i>
                    </th>

                    <th scope="col">Всего</th>
                    <th scope="col">Выплачено</th>
                    <th scope="col">Прогноз</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k => $row)
                <tr>
                    <th scope="row">{{$k}}</th>
                    <th>{{$row['calls']}}</th>
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
@section('scripts')
    <script>
        // $('.dates_inp').onchange(function (){
        //     console.log($(this).val())
        //    $('#dates').val($(this).val())
        // });

        function send(){
            $('#dates').val($('.datepicker-here').val());
            $('#submitForm').submit();
        }

        $('.city_item').click(function (){
           $('#cityBtn').text($(this).text())
           $('#city').val($(this).text());
        });

        $('.offer_item').click(function (){
           $('#offerSelect').text($(this).text())
           $('#offer_id').val($(this).data('id'));
        });
    </script>
@endsection
