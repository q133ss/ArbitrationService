@extends('layouts.dashboard')
@section('title', 'Финансы')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <h3 id="yourBalance">Ваш баланс: {{Auth()->User()->balance}} ₽</h3>
    <h6 class="mt-4">Банковские карты</h6>
    @if($cards->isEmpty())
        <span>У вас нет добавленных банковских карт.</span>
    @endif
    <div id="cards">
    @foreach($cards as $card)
        <div class="border p-3 mb-2 d-flex justify-content-between">
            <div>{{$card->card}}</div>
            <a class="btn-link text-danger">Удалить</a>
        </div>
    @endforeach
    </div>
    <button class="btn btn-primary" onclick="openForm()">Добавить карту</button>
    <button class="btn btn-info" onclick="openWithout()">Запросить вывод средств</button>

{{--    <div id="chart" class="mt-4"></div>--}}

    <div id="addCard" class="w-100 h-100 p-2 bg-white">
        <button type="button" class="add_card_close btn">X</button>
        <div class="addCardWrap h-100 d-grid align-items-center">
            <div class="row w-75 addCardWrap">
                <div class="text-danger" id="cardError"></div>
                <input type="text" id="cardNumberInput" class="form-control d-block col-sm" placeholder="0000 0000 0000 0000">
                <button type="button" onclick="addCard()" class="btn btn-primary d-block col-sm-3">Добавить карту</button>
            </div>
        </div>
    </div>

    <div id="without" class="w-100 h-100 p-2 bg-white">
        <button type="button" class="withoutCls btn">X</button>
        <div class="addCardWrap h-100 d-grid align-items-center">
            <div class="row w-75 addCardWrap">
                <div class="text-danger" id="withoutError"></div>
                <select name="card_id" id="cardId" class="form-control mb-3">
                    @foreach($cards as $card)
                    <option value="{{$card->id}}">{{$card->card}}</option>
                    @endforeach
                </select>
                <input type="text" id="sumInp" class="form-control d-block mb-3" placeholder="Сумма">
                <button type="button" onclick="sendQuery()" class="btn btn-primary d-block">Запросить</button>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var options = {
            series: [{
                name: "Итог за день",
                data: series.monthDataSeries1.prices
            }],
            chart: {
                type: 'area',
                height: 350,
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },

            title: {
                text: 'Статистика за прошлый месяц',
                align: 'left'
            },
            subtitle: {
                text: '',
                align: 'left'
            },
            labels: series.monthDataSeries1.dates,
            xaxis: {
                type: 'datetime',
            },
            yaxis: {
                opposite: true
            },
            legend: {
                horizontalAlign: 'left'
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        function openForm(){
            $('#addCard').addClass('open');
        }

        function openWithout(){
            $('#without').addClass('open');
        }

        $('.add_card_close').click(function (){
            $('#addCard').removeClass('open');
        });

        $('.withoutCls').click(function (){
            $('#without').removeClass('open');
        });

        function addCard(){
            let card = $('#cardNumberInput').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "/dashboard/master/add-card/",
                data : {
                    card
                },
                type : 'POST',
                success : function(result){
                    $('#addCard').removeClass('open');
                    $('#cards').append(
                        '<div class="border p-3 mb-2 d-flex justify-content-between">'+
                            '<div>'+result.card+'</div>'+
                            '<a class="btn-link text-danger">Удалить</a>'+
                        '</div>'
                    );
                },
                error: function (xhr){
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#cardError').text(value);
                    });
                }
            });
        }

        function sendQuery(){

            let cardId = $('#cardId').val();
            let sumInp = $('#sumInp').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "/dashboard/master/without/",
                data : {
                    'card_id' : cardId,
                    'sum' : sumInp
                },
                type : 'POST',
                success : function(result){
                    $('#userBalance').text(result + " ₽");
                    $('#yourBalance').text(result + " ₽");
                    $('#without').removeClass('open');
                    alert('Запрос на вывод успешно отправлен!');
                },
                error: function (xhr){
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#withoutError').text(value);
                    });
                }
            });
        }
    </script>
    <style>
        #addCard , #without{
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            display: none;
        }

        #addCard.open, #without.open{
            display: block;
        }

        .addCardWrap{
            margin: 0 auto;
        }

        .add_card_close, .add_card_close{
            position: relative;
            left: 95%;
        }

        @media screen and (max-width: 526px){
            .add_card_close, .add_card_close{
                position: relative;
                left: 90%;
            }
        }
    </style>
@endsection
