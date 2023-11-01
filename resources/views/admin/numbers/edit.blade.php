@extends('layouts.dashboard')
@section('title', 'Изменить номер')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="text-danger mb-3">{{$errors->first()}}</div>
            @endif
            <div class="card-wrapper rounded-3">
                <h1>{{$number->number}}</h1>
                <form class="row g-3" method="POST" action="{{route('admin.numbers.update', $number->id)}}">
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label" for="selectRole">Пользователь</label>
                        <select class="form-select" name="user_id" id="selectRole">
                            @foreach($users as $user)
                                <option @if($user->id == $number->user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="selectOffer">Оффер</label>
                        <select class="form-select" name="offer_id" id="selectOffer">
                            @foreach($offers as $offer)
                                <option @if($offer->id == $number->offer_id) selected @endif value="{{$offer->id}}">{{$offer->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
