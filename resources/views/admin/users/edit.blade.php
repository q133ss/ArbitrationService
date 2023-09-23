@extends('layouts.dashboard')
@section('title', 'Изменить пользователя '.$user->name)
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
                <form class="row g-3" method="POST" action="{{route('admin.users.update', $user->id)}}">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="col-md-12">
                        <label class="form-label" for="inputName">Дата регистрации: {{\Carbon\Carbon::parse($user->created_at)->format('d.m.Y H:i')}}</label>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputName">Имя</label>
                        <input class="form-control" name="name" id="inputName" value="{{$user->name}}" type="text" placeholder="Имя">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputEmail4">Email</label>
                        <input class="form-control" value="{{$user->email}}" name="email" id="inputEmail4" type="email" placeholder="mail@email.com">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Пароль</label>
                        <input class="form-control" name="password" id="inputPassword4" type="password" placeholder="********">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="selectRole">Роль</label>
                        <select class="form-select" name="role_id" id="selectRole">
                            @foreach($roles as $role)
                                <option @if($user->role_id == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Подтвердить профиль?</label>
                        <div class="mb-3 d-flex gap-3 checkbox-checked">
                            <div class="form-check">
                                <input class="form-check-input" value="1" id="flexRadioDefault1" type="radio" name="confirmed" @if($user->confirmed == true) checked="" @endif>
                                <label class="form-check-label mb-0" for="flexRadioDefault1">Да</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="0" id="flexRadioDefault2" type="radio" name="confirmed" @if($user->confirmed == false) checked="" @endif>
                                <label class="form-check-label mb-0" for="flexRadioDefault2">Нет</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Обновить</button>
                    </div>
                </form>
                <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
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
