@extends('layouts.dashboard')
@section('title', 'Добавить пользователя')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-wrapper rounded-3">
                <form class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label" for="inputEmail4">Email</label>
                        <input class="form-control" id="inputEmail4" type="email" placeholder="Enter Your Email">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Пароль</label>
                        <input class="form-control" id="inputPassword4" type="password" placeholder="Enter Your Password">
                    </div>
                    <div class="col-12">
                        <div class="form-check checkbox-checked">
                            <input class="form-check-input" id="gridCheck1" type="checkbox">
                            <label class="form-check-label" for="gridCheck1">Check me out</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Sign in </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
