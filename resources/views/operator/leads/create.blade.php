@extends('layouts.dashboard')
@section('title', 'Добавить лид')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://unpkg.com/imask"></script>
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
                <form class="row g-3" method="POST" action="{{route('operator.lead.store')}}">
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label" for="inputEmail4">Оффер*</label>
                        <select name="offer_id" id="" class="form-control">
                            @foreach($offers as $offer)
                                <option @if(old('offer_id') == $offer->id) selected @endif  value="{{$offer->id}}">{{$offer->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputEmail4">Мастер*</label>
                        <select name="master_id" id="" class="form-control">
                            @foreach($masters as $master)
                                <option @if(old('master_id') == $master->id) selected @endif  value="{{$master->id}}">{{$master->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputName">Телефон*</label>
                        <input type="text" class="form-control" value="{{old('phone')}}" id="phoneNumber" name="phone">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputName">Имя</label>
                        <input class="form-control" name="name" value="{{old('name')}}" id="inputName" type="text" placeholder="Имя">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputEmail4">Город</label>
                        <input class="form-control" value="{{old('city')}}" name="city" id="inputEmail4" type="text" placeholder="Город">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        IMask(
            document.getElementById('phoneNumber'),
            {
                mask: '+{7}(000)000-00-00'
            }
        )
    </script>
@endsection
