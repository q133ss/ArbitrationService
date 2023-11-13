@extends('layouts.dashboard')
@section('title', 'Лиды')
@section('content')
    <div class="card">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @php
        $masters = \App\Models\User::whereIn('id', $leads->pluck('master_id')->all())->get();
        $offers = \App\Models\Offer::whereIn('id', $leads->pluck('offer_id')->all())->get();
        @endphp
        <div class="row mb-2 mt-2 justify-content-center">
            <form class="col-sm-10 pl-1 pr-1" action="{{route('admin.leads')}}" style="display: grid; grid-template-columns: repeat(4, 1fr); grid-column-gap: 30px">
                <input class="datepicker-here form-control digits w-100 dates_inp" placeholder="Дата" value="{{\Request()->date}}" type="text" name="date" data-range="true" data-multiple-dates-separator=" - " data-language="ru">
                <select class="form-control" name="master_id" id="ss">
                    <option value="" disabled selected>Мастер</option>
                    @foreach($masters as $master)
                        <option value="{{$master->id}}">{{$master->name}}</option>
                    @endforeach
                </select>
                <select class="form-control" name="offer_id" id="ss">
                    <option value="" disabled selected>Оффер</option>
                    @foreach($offers as $offer)
                        <option value="{{$offer->id}}">{{$offer->name}}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary">Фильтр</button>
            </form>
        </div>
            @if(\Request()->date != null)
                Сумма за выбранный период: {{$leads->sum('price')}}
            @endif
        <div class="card-block row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">Оффер</th>
                            <th scope="col">Мастер</th>
                            <th scope="col">Сумма</th>
                            <th scope="col">Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leads as $lead)
                            <tr>
                                <th scope="row">{{$lead->id}}</th>
                                <td>{{$lead->phone}}</td>
                                <td><a href="{{route('admin.offers.edit', $lead->offer->id)}}">{{$lead->offer->name}}</a></td>
                                <td><a href="{{route('admin.users.show', $lead->master->id)}}">{{$lead->master->name}}</a></td>
                                <td>{{$lead->price}}</td>
                                <td>{{$lead->getStatus()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
