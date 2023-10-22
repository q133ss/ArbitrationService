@extends('layouts.dashboard')
@section('title', 'Главная')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>Лиды за неделю </h5>
                </div>
                <div class="card-body">
                    <div id="basic-apex"></div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>Сумма лидов за неделю </h5>
                </div>
                <div class="card-body">
                    <div id="sum"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var options = {
            series: [{
                name: "Колличество лидов",
                data: [
                    @foreach($leads as $lead)
                    {{$lead}},
                    @endforeach
                ]
            }],
            chart: {
                type: 'area',
                height: 350,
                defaultLocale: 'ru',
                locales: [{
                    name: 'ru',
                    options: {
                        months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                        shortMonths: ['Янв', 'Фев', 'Март', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
                        days: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
                        shortDays: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                        toolbar: {
                            download: 'Скачать SVG',
                            selection: 'Выбор',
                            selectionZoom: 'Масштаб выбора',
                            zoomIn: 'Приблизить',
                            zoomOut: 'Отдалить',
                            pan: 'Панорамирование',
                            reset: 'Убрать zoom',
                        }
                    }
                }],
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
                text: 'Колличество лидов за каждый день',
                align: 'left'
            },
            subtitle: {
                text: '',
                align: 'left'
            },
            labels: [
                @foreach($leads as $date => $count)
                    '{{$date}}',
                @endforeach
            ],
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

        // SuM

        var optionsSum = {
            series: [{
                name: "Сумма лидов",
                data: [
                    @foreach($sums as $sum)
                        '{{$sum}}',
                    @endforeach
                ]
            }],
            chart: {
                type: 'area',
                height: 350,
                defaultLocale: 'ru',
                locales: [{
                    name: 'ru',
                    options: {
                        months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                        shortMonths: ['Янв', 'Фев', 'Март', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
                        days: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
                        shortDays: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                        toolbar: {
                            download: 'Скачать SVG',
                            selection: 'Выбор',
                            selectionZoom: 'Масштаб выбора',
                            zoomIn: 'Приблизить',
                            zoomOut: 'Отдалить',
                            pan: 'Панорамирование',
                            reset: 'Убрать zoom',
                        }
                    }
                }],
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
                text: 'Колличество лидов за каждый день',
                align: 'left'
            },
            subtitle: {
                text: '',
                align: 'left'
            },
            labels: [
                @foreach($leads as $date => $lead)
                    '{{$date}}',
                @endforeach
            ],
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

        var chart = new ApexCharts(document.querySelector("#basic-apex"), options);
        chart.render();

        var sumChart = new ApexCharts(document.querySelector("#sum"), optionsSum);
        sumChart.render();
    </script>
@endsection
