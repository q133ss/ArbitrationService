@extends('layouts.dashboard')
@section('title', 'Просмотр лида')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
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
                <form class="row g-3" method="POST" action="{{route('adv.leads.update', $lead->id)}}">
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label" for="inputEmail4">Оффер:</label>
                        <a href="{{route('adv.offers.show', $lead->offer->id)}}" target="_blank">{{$lead->offer->name}}</a>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputName">Телефон: <a href="tel:{{$lead->phone}}">{{$lead->phone}}</a></label>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputName">Имя</label>
                        <input class="form-control" name="name" id="inputName" value="{{$lead->name}}" type="text" placeholder="Имя">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputEmail4">Город</label>
                        <input class="form-control" value="{{$lead->city}}" name="city" id="inputEmail4" type="text" placeholder="Город">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputEmail5">Адрес</label>
                        <input class="form-control" value="{{$lead->address}}" name="address" id="inputEmail5" type="text" placeholder="Адрес">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputEmail2">Комментарий</label>
                        <textarea name="comment" class="form-control" id="inputEmail2" cols="30" rows="10">{{$lead->comment}}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="col-form-label" for="cleave-date1">Дата на которую договорились</label>
                        <input class="form-control" name="date" id="cleave-date1" type="text" placeholder="ДД-ММ-ГГГГ" value="{{\Carbon\Carbon::parse($lead->date)->format('d-m-Y')}}">
                    </div>

                    <div class="col-12">
                        <label class="col-form-label" for="cleave-time2">Время на которое договорились</label>
                        <input class="form-control" name="time" id="cleave-time2" type="text" placeholder="ЧЧ:ММ" value="{{$lead->time}}">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Статус</label>
                        @if($lead->status != 'accept')
                        @php
                        $statuses = ['hold' => 'Не обработан','accept' => 'Принят','cancel' => 'Отклонен'];
                        @endphp
                        <select class="form-select" id="validationCustom04" name="status">
                            @foreach($statuses as $status => $name)
                                <option value="{{$status}}" @if($lead->status == $status) checked @endif>{{$name}}</option>
                            @endforeach
                        </select>
                        @else
                            <br>
                            <span class="text-success">Подтвержден</span>
                        @endif
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
    <script>
        new Cleave('#cleave-date1', {
            date: true,
            delimiter: '-',
            datePattern: ['d', 'm', 'Y']
        });

        new Cleave('#cleave-time2', {
            time: true,
            timePattern: ['h', 'm']
        });
    </script>
@endsection
