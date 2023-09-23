@extends('layouts.dashboard')
@section('title', $offer->name)
@section('content')
<div class="card">
    <div class="card-body">
        <span class="text-primary">Цель:</span> {{$offer->target}} <br>
        <span class="text-primary">Цена за лид:</span> {{$offer->price}} ₽ <br> <br>
        {!! $offer->description !!}
        <br>
        @if(Auth()->User()->offers->where('id', $offer->id)->isEmpty())
            <a href="{{route('master.offers.request', $offer->id)}}" class="btn btn-primary mt-3">Оставить заявку</a>
        @else
            <strong class="mt-4">Вы оставили заявку на данный офер</strong>
            <br>
            <a href="{{route('master.offers.my')}}" class="btn-link">Мои оферы</a>
        @endif
    </div>
</div>
@endsection
