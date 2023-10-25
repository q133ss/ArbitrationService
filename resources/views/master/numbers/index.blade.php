@extends('layouts.dashboard')
@section('title', 'Мои номера')
@section('content')
    <div class="card">
        <div class="card-block row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">Оффер</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($numbers as $number)
                            <tr>
                                <th scope="row">{{$number->id}}</th>
                                <td>{{$number->number}}</td>
                                <td>{{$number->offer->name ?? '-'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
