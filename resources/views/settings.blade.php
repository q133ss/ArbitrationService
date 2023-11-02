@extends('layouts.dashboard')
@section('title', 'Настройки')
@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="text-danger mb-3">{{$errors->first()}}</div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card-wrapper rounded-3">
                <form class="row g-3" method="POST" action="{{route('settings.update', $user->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label" for="inputName">Имя</label>
                        <input class="form-control" name="name" id="inputName" value="{{$user->name}}" type="text" placeholder="Имя">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Старый пароль</label>
                        <input class="form-control" name="old_password" value="" id="inputPassword4" type="password" placeholder="********">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Новый пароль</label>
                        <input class="form-control" name="new_password" value="" id="inputPassword4" type="password" placeholder="********">
                    </div>


                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Изображение профиля</label>
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Обновить</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection
