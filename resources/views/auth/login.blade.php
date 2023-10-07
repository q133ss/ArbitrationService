@extends('layouts.auth')
@section('title', 'Вход')
@section('content')
    <div>
        <div>
            <a class="logo" href="/">
                <img class="img-fluid for-light" src="../assets/images/logo.svg" alt="looginpage">
                <img class="img-fluid for-dark" src="../assets/images/logo.svg" alt="looginpage">
            </a>
        </div>
        <div class="login-main">
            @if ($errors->any())
                <div class="text-danger mb-3">{{$errors->first()}}</div>
            @endif
            <form class="theme-form" method="POST" action="{{route('login')}}">
                @csrf
                <h4>Вход</h4>
                <p>Введите ваш email и пароль</p>
                <div class="form-group">
                    <label class="col-form-label">Email</label>
                    <input class="form-control" name="email" type="email" value="{{old('email')}}" required="" placeholder="main@mail.com">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Пароль</label>
                    <div class="form-input position-relative">
                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                    </div>
                </div>
                <div class="form-group mb-0">
                    <div class="checkbox p-0">
                        <input id="checkbox1" name="remember" type="checkbox">
                        <label class="text-muted" for="checkbox1">Запомнить меня</label>
                    </div><a class="link" href="#">Забыли пароль?</a>
                    <div class="text-end mt-3">
                        <button class="btn btn-primary btn-block w-100" type="submit">Войти</button>
                    </div>
                </div>
                <p class="mt-4 mb-0 text-center">Нет аккаунта?<a class="ms-2" href="{{route('register')}}">Регистрация</a></p>
            </form>
        </div>
    </div>
@endsection
