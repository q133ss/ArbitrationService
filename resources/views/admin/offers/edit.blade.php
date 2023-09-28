@extends('layouts.dashboard')
@section('title', 'Изменить офер '.$offer->name)
@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="text-danger mb-3">{{$errors->first()}}</div>
            @endif
            <div class="card-wrapper rounded-3">
                <form class="row g-3" method="POST" action="{{route('admin.offers.update', $offer->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label" for="inputName">Название</label>
                        <input class="form-control" name="name" id="inputName" value="{{$offer->name}}" type="text" placeholder="Имя">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="except">Краткое описание</label>
                        <textarea name="except" class="form-control" id="except" cols="30" rows="10">{{$offer->except}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="description">Подробное описание</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$offer->description}}</textarea>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Цель</label>
                        <input class="form-control" name="target" value="{{$offer->target}}" id="inputPassword4" type="text" placeholder="Оплаченный заказ">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Вознаграждение вебматеру</label>
                        <input class="form-control" name="price" value="{{$offer->price}}" id="inputPassword4" type="text" placeholder="1000">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="advertiser_id">Рекламодатель</label>
                        <select class="form-select" name="advertiser_id" id="advertiser_id">
                            @foreach($advertisers as $advertiser)
                                <option @if($offer->advertiser_id == $advertiser->id) selected @endif value="{{$advertiser->id}}">{{$advertiser->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Обновить</button>
                    </div>
                </form>

                <form action="{{route('admin.offers.destroy', $offer->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button id="confirm" class="btn btn-link text-danger mt-3">Удалить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#confirm').click(function (){
            let alert = confirm('Подтвердите действие');
            if(!alert){
                return false;
            }
        });
    </script>
@endsection
