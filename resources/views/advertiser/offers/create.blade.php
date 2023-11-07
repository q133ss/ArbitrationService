@extends('layouts.dashboard')
@section('title', 'Предложить оффер')
@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="text-danger mb-3">{{$errors->first()}}</div>
            @endif
            <div class="card-wrapper rounded-3">
                <form class="row g-3" method="POST" action="{{route('adv.offers.store')}}" enctype="multipart/form-data">
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

                    <div class="col-md-12" id="forPartners">
                        <label class="form-label" for="inputName">Преимущества данного оффера для партнера</label>
                        <div class="d-flex gap-2">
                            <input class="form-control" name="for_partner[]" id="inputName" type="text" placeholder="Преимущество">
                            <button class="btn btn-primary btn-sm" onclick="forPartnersAdd()" type="button">+</button>
                        </div>

                        @if(old('for_partner'))
                            @foreach(old('for_partner') as $k => $partner)
                                <div class="d-flex gap-2 mt-2" id="partner_row_{{$k}}">
                                    <input class="form-control" name="for_partner[]" value="{{$partner}}" id="inputName" type="text" placeholder="Преимущество">
                                    <button class="btn btn-danger" onclick="rowDelete('partner_row_{{$k}}')" type="button">-</button>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-md-12" id="forClients">
                        <label class="form-label" for="inputName">Преимущества для клиента</label>
                        <div class="d-flex gap-2">
                            <input class="form-control" name="for_client[]" id="inputName" type="text" placeholder="Преимущество">
                            <button class="btn btn-primary btn-sm" onclick="forClientAdd()" type="button">+</button>
                        </div>

                        @if(old('for_client'))
                            @foreach(old('for_client') as $k => $client)
                                <div class="d-flex gap-2 mt-2" id="client_row_{{$k}}">
                                    <input class="form-control" name="for_client[]" value="{{$client}}" id="inputName" type="text" placeholder="Преимущество">
                                    <button class="btn btn-danger" onclick="rowDelete('client_row_{{$k}}')" type="button">-</button>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-md-12" id="distinctive">
                        <label class="form-label" for="inputName">Отличительные особенности</label>
                        <div class="d-flex gap-2">
                            <input class="form-control" name="distinctive[]" id="inputName" type="text" placeholder="Особенность">
                            <button class="btn btn-primary btn-sm" onclick="distinctiveAdd()" type="button">+</button>
                        </div>

                        @if(old('distinctive'))
                            @foreach(old('distinctive') as $k => $distinctive)
                                <div class="d-flex gap-2 mt-2" id="distinctive_{{$k}}">
                                    <input class="form-control" name="distinctive[]" value="{{$distinctive}}" id="inputName" type="text" placeholder="Преимущество">
                                    <button class="btn btn-danger" onclick="rowDelete('distinctive_{{$k}}')" type="button">-</button>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Холд</label>
                        <input class="form-control" name="hold" value="{{old('hold')}}" id="inputPassword4" type="text" placeholder="24 часа">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="inputPassword4">Направление</label>
                        <input class="form-control" name="vector" value="{{old('vector')}}" id="inputPassword4" type="text" placeholder="Ремонт БТ">
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
                        <label class="form-label" for="inputPassword4">Файлы</label>
                        <input type="file" multiple name="files[]" class="form-control">
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Предложить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        partnersCount = 1;
        clientCount = 1;
        distinctiveCount = 1;
        function forPartnersAdd(){
            partnersCount++;
            $('#forPartners').append(
                '<div class="d-flex gap-2 mt-2" id="partner_row_'+partnersCount+'">'+
                '<input class="form-control" name="for_partner[]" id="inputName" type="text" placeholder="Преимущество">'+
                '<button class="btn btn-danger" onclick="rowDelete(\'partner_row_'+partnersCount+'\')" type="button">-</button>'+
                '</div>'
            );
        }

        function forClientAdd(){
            clientCount++;
            $('#forClients').append(
                '<div class="d-flex gap-2 mt-2" id="client_row_'+clientCount+'">'+
                '<input class="form-control" name="for_client[]" id="inputName" type="text" placeholder="Преимущество">'+
                '<button class="btn btn-danger" onclick="rowDelete(\'client_row_'+clientCount+'\')" type="button">-</button>'+
                '</div>'
            );
        }

        function distinctiveAdd(){
            distinctiveCount++;
            $('#distinctive').append(
                '<div class="d-flex gap-2 mt-2" id="distinctive_'+distinctiveCount+'">'+
                '<input class="form-control" name="distinctive[]" id="inputName" type="text" placeholder="Особенность">'+
                '<button class="btn btn-danger" onclick="rowDelete(\'distinctive_'+distinctiveCount+'\')" type="button">-</button>'+
                '</div>'
            );
        }

        function rowDelete(row){
            $('#'+row).remove();
        }
    </script>
@endsection
