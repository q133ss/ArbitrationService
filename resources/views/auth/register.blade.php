@extends('layouts.auth')
@section('title', 'Регистрация')
@section('content')
    <div>
        <div><a class="logo" href="/"><img class="img-fluid for-light" src="../assets/images/logo/logo-icon.png" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
        <div class="login-main">
            @if ($errors->any())
                <div class="text-danger mb-3">{{$errors->first()}}</div>
            @endif
            <form class="theme-form" method="POST" action="{{route('register')}}">
                @csrf
                <h4>Регистрация</h4>
                <p>Введите ваши данные, что бы создать аккаунт</p>
                <div class="form-group">
                    <label class="col-form-label pt-0">Ваше имя</label>
                    <div class="row g-2">
                        <div class="col-12">
                            <input class="form-control" value="{{old('name')}}" name="name" type="text" required="" placeholder="Имя">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Email</label>
                    <input class="form-control" name="email" value="{{old('email')}}" type="email" required="" placeholder="mail@mail.com">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Пароль</label>
                    <div class="form-input position-relative">
                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Повторите пароль</label>
                    <div class="form-input position-relative">
                        <input class="form-control" type="password" name="re-password" required="" placeholder="*********">
                    </div>
                </div>
                <div class="form-group mb-0">
                    <div class="checkbox p-0">
                        <input id="checkbox1" type="checkbox">
                        <label class="text-muted" for="checkbox1">Я согласен с<a class="ms-2" href="#">политикой <br> конфиденциальности</a></label>
                    </div>
                    <button class="btn btn-primary btn-block w-100" type="submit">Создать аккаунт</button>
                </div>
                <p class="mt-4 mb-0">Уже есть аккаунт?<a class="ms-2" href="{{route('login')}}">Войти</a></p>
            </form>
        </div>
    </div>
@endsection
