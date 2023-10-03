@extends('layouts.dashboard')
@section('title', 'Офер '.$offer->name)
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card-wrapper rounded-3">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label" for="inputName">Название</label>
                        <span class="form-control">{{$offer->name}}</span>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="except">Краткое описание</label>
                        <p class="form-control">{{$offer->except}}</p>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="description">Подробное описание</label>
                        <p class="form-control">{{$offer->description}}</p>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Цель</label>
                        <span class="form-control">{{$offer->target}}</span>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Вознаграждение вебматеру</label>
                        <span class="form-control">{{$offer->price}}</span>
                    </div>

                    <form action="{{route('adv.offers.add.file', $offer->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label" for="inputPassword4">Файлы</label>
                            <input type="file" multiple name="files[]" class="form-control">
                        </div>

                        <div class="row mt-4 mb-3">
                            @foreach($offer->files() as $file)
                                <div class="border p-2 col-sm-2 d-grid">
                                    <img src="{{$file}}" class="" width="100%" alt="">
                                    <button type="button" data-img="{{$file}}" class="btn text-danger align-self-end delete-img">Удалить</button>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Добавить файлы</button>
                        </div>
                    </form>
                </div>
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

        $('.delete-img').click(function (){
            let alert = confirm('Подтвердите действие');
            if(!alert){
                return false;
            }
            let img = $(this).data('img');

            let _this = $(this);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{route('adv.offers.remove.file')}}",
                data : {
                    'img': img
                },
                type : 'POST',
                success : function(result){
                    _this.parent().remove();
                }
            });

        });
    </script>
@endsection
