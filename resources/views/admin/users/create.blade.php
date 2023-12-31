@extends('layouts.dashboard')
@section('title', 'Добавить пользователя')
@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="text-danger mb-3">{{$errors->first()}}</div>
            @endif
            <div class="card-wrapper rounded-3">
                <form class="row g-3" method="POST" action="{{route('admin.users.store')}}">
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label" for="inputName">Имя</label>
                        <input class="form-control" name="name" id="inputName" value="{{old('name')}}" type="text" placeholder="Имя">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputEmail4">Email</label>
                        <input class="form-control" value="{{old('email')}}" name="email" id="inputEmail4" type="email" placeholder="mail@email.com">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Пароль</label>
                        <input class="form-control" name="password" id="inputPassword4" type="password" placeholder="********">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="selectRole">Роль</label>
                        <select class="form-select" name="role_id" id="selectRole">
                        @foreach($roles as $role)
                                <option @if(old('role_id') == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Подтвердить профиль?</label>
                        <div class="mb-3 d-flex gap-3 checkbox-checked">
                            <div class="form-check">
                                <input class="form-check-input" value="1" id="flexRadioDefault1" type="radio" name="confirmed">
                                <label class="form-check-label mb-0" for="flexRadioDefault1">Да</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="0" id="flexRadioDefault2" type="radio" name="confirmed" checked="">
                                <label class="form-check-label mb-0" for="flexRadioDefault2">Нет</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
