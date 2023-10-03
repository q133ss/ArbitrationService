@extends('layouts.dashboard')
@section('title', 'Оферы')
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
                            @foreach($offers as $offer)
                            <div class="row">
                                <div class="col col-md-12">
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
                                        <a href="{{route('adv.offers.show', $offer->id)}}" class="btn btn-info">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
