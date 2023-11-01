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
                        @foreach($withdraws as $withdraw)
                        <tr>
                            <td>{{$withdraw->created_at->format('d-m-Y H:i')}}</td>
                            <td>
                                {{$withdraw->sum}}₽
                            </td>
                            <td>
                                @if($withdraw->status == 'wait')
                                    <span class="text-info">В процессе</span>
                                @elseif($withdraw->status == 'done')
                                    <span class="text-success">Завершена</span>
                                @elseif($withdraw->status == 'cancel')
                                    <span class="text-danger">Отклонена</span>
                                @endif
                            </td>
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
