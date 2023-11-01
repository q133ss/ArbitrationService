@extends('layouts.dashboard')
@section('title', $offer->name)
@section('content')
<div class="card">
    <div class="card-body">
        <span class="text-primary">Цель:</span> {{$offer->target}} <br>
        <span class="text-primary">Цена за лид:</span> {{$offer->price}} ₽ <br> <br>
        {!! $offer->description !!}
        <br><br>
        <span class="text-primary">Преимущества данного оффера для партнера:</span> <br>
        <ol>
            @foreach(json_decode($offer->for_partner) as $partner)
                <li>{{$partner}}</li>
            @endforeach
        </ol>
        <br>

        <span class="text-primary">Преимущества для клиента:</span> <br>
        <ol>
            @foreach(json_decode($offer->for_client) as $client)
                <li>{{$client}}</li>
            @endforeach
        </ol>
        <br>

        <span class="text-primary">Отличительные особенности:</span> <br>
        <ol>
            @foreach(json_decode($offer->distinctive) as $distinctive)
                <li>{{$distinctive}}</li>
            @endforeach
        </ol>

        <br>
        @if(Auth()->User()->offers->where('id', $offer->id)->isEmpty())
            <a href="{{route('master.offers.request', $offer->id)}}" class="btn btn-primary mt-3">Оставить заявку</a>
        @else
            <strong class="mt-4">Вы оставили заявку на данный оффер</strong>
            <br>
            <a href="{{route('master.offers.my')}}" class="btn-link">Мои офферы</a>
        @endif
    </div>
</div>
@endsection
