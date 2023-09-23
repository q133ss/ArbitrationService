@extends('layouts.dashboard')
@section('title', 'Выплаты')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="order-history table-responsive wishlist">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Сумма</th>
                            <th>Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>23.09.2023</td>
                            <td>
                                10.000₽
                            </td>
                            <td>
                                <span class="text-info">В процессе</span>
                            </td>
                        </tr>

                        <tr>
                            <td>23.09.2023</td>
                            <td>
                                12.000₽
                            </td>
                            <td>
                                <span class="text-success">Выполнен</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
