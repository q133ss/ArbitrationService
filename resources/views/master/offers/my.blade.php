@extends('layouts.dashboard')
@section('title', 'Мои офферы')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="tab-content" id="top-tabContent">
                    <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <div class="row">
                            @if($offers->isEmpty())
                                Вы еще не оставляли заявки на офферы.
                                <a href="{{route('master.offers.index')}}" class="btn-link p-0">Все офферы</a>
                            @endif
                            @foreach($offers as $offer)
                                <div class="col-xxl-4 col-md-12">
                                    <div class="project-box">
                                        <h6>{{$offer->name}}</h6>
                                        <div class="media">
                                            <div class="media-body">
                                                <p>
                                                    <strong>Цель:</strong> {{$offer->target}}
                                                </p>
                                                <p>
                                                    <strong>Цена за лид:</strong> {{$offer->price}}₽
                                                </p>
                                            </div>
                                        </div>
                                        <p>
                                            {{$offer->except}}
                                        </p>
                                        Статус заявки:
                                        @if($offer->pivot->approved == 'wait')
                                            <span class="text-primary">на рассмотрении</span>
                                        @elseif($offer->pivot->approved == 'approved')
                                            <span class="text-success">одобрена</span>
                                        @elseif($offer->pivot->approved == 'canceled')
                                            <span class="text-danger">отклонена</span>
                                        @endif
                                        <br><br>
                                        <a href="{{route('master.offers.show', $offer->id)}}" class="btn btn-info">Подробнее</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
