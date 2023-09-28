@extends('layouts.dashboard')
@section('title', 'Добавить офер')
@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="text-danger mb-3">{{$errors->first()}}</div>
            @endif
            <div class="card-wrapper rounded-3">
                <form class="row g-3" method="POST" action="{{route('admin.offers.store')}}">
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label" for="inputName">Название</label>
                        <input class="form-control" name="name" id="inputName" value="{{old('name')}}" type="text" placeholder="Имя">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="except">Краткое описание</label>
                        <textarea name="except" class="form-control" id="except" cols="30" rows="10">{{old('except')}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="description">Подробное описание</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{old('description')}}</textarea>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Цель</label>
                        <input class="form-control" name="target" value="{{old('target')}}" id="inputPassword4" type="text" placeholder="Оплаченный заказ">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Вознаграждение вебматеру</label>
                        <input class="form-control" name="price" value="{{old('price')}}" id="inputPassword4" type="text" placeholder="1000">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="advertiser_id">Рекламодатель</label>
                        <select class="form-select" name="advertiser_id" id="advertiser_id">
                            @foreach($advertisers as $advertiser)
                                <option @if(old('advertiser_id') == $advertiser->id) selected @endif value="{{$advertiser->id}}">{{$advertiser->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
