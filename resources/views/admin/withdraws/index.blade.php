@extends('layouts.dashboard')
@section('title', 'Выплаты')
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
                            <th scope="col">Пользователь</th>
                            <th scope="col">Сумма</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($withdraws as $withdrow)
                            <tr>
                                <th scope="row">{{$withdrow->id}}</th>
                                <td>
                                    <a href="{{route('admin.users.edit', $withdrow->user->id)}}" target="_blank">{{$withdrow->user->name}}</a>
                                </td>
                                <td>
                                    {{$withdrow->sum}}
                                </td>
                                <td>
                                    @php
                                        $color = match($withdrow->status){
                                            'wait' => 'text-primary',
                                            'done' => 'text-success',
                                            'cancel' => 'text-danger'
                                        };
                                        $text = match($withdrow->status){
                                            'wait' => 'Ожидает оплаты',
                                            'done' => 'Завершена',
                                            'cancel' => 'Отклонена'
                                        };
                                    @endphp
                                    <span class="{{$color}}">{{$text}}</span>
                                </td>
                                <td>
                                    @if($withdrow->status != 'cancel')
                                    <a href="{{route('admin.withdraw', [$withdrow->id, 'done'])}}" class="btn btn-info">Завершить</a>
                                    <a href="{{route('admin.withdraw', [$withdrow->id, 'cancel'])}}" class="btn btn-danger">Отклонить</a>
                                    @endif
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
