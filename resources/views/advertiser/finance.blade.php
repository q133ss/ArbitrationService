@extends('layouts.dashboard')
@section('title', 'Финансы')
@section('content')
    <div class="card">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(Auth()->user()->balance < 0)
        <h5 class="mt-2 mb-2" style="padding-left: 10px">Ваша задолжность: {{str_replace('-', '', Auth()->user()->balance)}} ₽</h5>
        @endif
        <div class="card-block row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Сумма</th>
                            <th scope="col">Лид</th>
                            <th scope="col">Описание</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($operations as $operation)
                            <tr>
                                <th scope="row">{{$operation->id}}</th>
                                <td @if($operation->sum < 0) class="text-danger" @else class="text-success" @endif>{{$operation->sum}}</td>
                                <td>{{$operation->lead ? $operation->lead->id : '-'}}</td>
                                <td>{{$operation->description}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
