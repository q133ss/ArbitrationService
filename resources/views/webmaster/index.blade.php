@extends('layouts.dashboard')
@section('title', 'Главная')
@section('content')
    <div class="card">
        @include('webmaster.inc.statistic.nav')
        <hr>

        <div class="d-flex gap-2 p-2">
            <input class="datepicker-here form-control digits w-25" type="text" data-range="true" data-multiple-dates-separator=" - " data-language="ru">

            <div class="btn-group">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Направления</button>
                <ul class="dropdown-menu dropdown-block" style="">
                    <li><a class="dropdown-item" href="#">Project</a></li>
                    <li><a class="dropdown-item" href="#">Ecommerce</a></li>
                    <li><a class="dropdown-item" href="#">Crypto</a></li>
                </ul>
            </div>

            <div class="btn-group">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Офферы</button>
                <ul class="dropdown-menu dropdown-block" style="">
                    <li><a class="dropdown-item" href="#">Project</a></li>
                    <li><a class="dropdown-item" href="#">Ecommerce</a></li>
                    <li><a class="dropdown-item" href="#">Crypto</a></li>
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
                <tr>
                    <th scope="row">45</th>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                    <td>2</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>950</td>
                    <td>0</td>
                    <td>950</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
