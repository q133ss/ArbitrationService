@extends('layouts.dashboard')
@section('title', 'Финансы')
@section('content')
    <h3>Ваш баланс: {{Auth()->User()->balance}} ₽</h3>
    <div class="border p-3 mb-2 d-flex justify-content-between">
        <div><strong>Ваша банковская карта:</strong> 2202 0513 **** 0000</div>
        <a class="btn-link">Изменить</a>
    </div>
    <button class="btn btn-info mb-3">Запросить вывод средств</button>

    <div id="chart"></div>
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
    </script>
@endsection
