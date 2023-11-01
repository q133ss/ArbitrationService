@extends('layouts.dashboard')
@section('title', 'Оффер '.$offer->name)
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
                    @if ($errors->any())
                        <div class="text-danger mb-3">{{$errors->first()}}</div>
                    @endif
                    @if($offer->approved == true)<form action="{{route('adv.offers.update', $offer->id)}}" method="POST">@endif
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label" for="inputName">Название</label>
                            <input class="form-control" id="inputName" name="name" value="{{$offer->name}}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="except">Краткое описание</label>
                            <textarea class="form-control" id="except" name="except">{{$offer->except}}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="description">Подробное описание</label>
                            <textarea name="description" id="description" class="form-control">{{$offer->description}}</textarea>
                        </div>

                        <div class="col-md-12" id="forPartners">
                            <label class="form-label" for="inputName">Преимущества данного оффера для партнера</label>
                            <div class="d-flex gap-2">
                                <input class="form-control" name="for_partner[]" id="inputName" type="text" placeholder="Преимущество">
                                <button class="btn btn-primary btn-sm" onclick="forPartnersAdd()" type="button">+</button>
                            </div>
                            @foreach(json_decode($offer->for_partner) as $k => $partner)
                                <div class="d-flex gap-2 mt-2" id="partner_row_{{$k}}">
                                    <input class="form-control" name="for_partner[]" value="{{$partner}}" id="inputName" type="text" placeholder="Преимущество">
                                    <button class="btn btn-danger" onclick="rowDelete('partner_row_{{$k}}')" type="button">-</button>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-12" id="forClients">
                            <label class="form-label" for="inputName">Преимущества для клиента</label>
                            <div class="d-flex gap-2">
                                <input class="form-control" name="for_client[]" id="inputName" type="text" placeholder="Преимущество">
                                <button class="btn btn-primary btn-sm" onclick="forClientAdd()" type="button">+</button>
                            </div>
                            @foreach(json_decode($offer->for_client) as $k => $client)
                                <div class="d-flex gap-2 mt-2" id="client_row_{{$k}}">
                                    <input class="form-control" name="for_client[]" value="{{$client}}" id="inputName" type="text" placeholder="Преимущество">
                                    <button class="btn btn-danger" onclick="rowDelete('client_row_{{$k}}')" type="button">-</button>
                                </div>
                            @endforeach
                        </div>

                        <input type="hidden" name="advertiser_id" value="{{Auth()->id()}}">

                        <div class="col-md-12" id="distinctive">
                            <label class="form-label" for="inputName">Отличительные особенности</label>

                            <div class="d-flex gap-2">
                                <input class="form-control" name="distinctive[]" id="inputName" type="text" placeholder="Особенность">
                                <button class="btn btn-primary btn-sm" onclick="distinctiveAdd()" type="button">+</button>
                            </div>

                            @foreach(json_decode($offer->distinctive) as $k => $distinctive)
                                <div class="d-flex gap-2 mt-2" id="distinctive_{{$k}}">
                                    <input class="form-control" name="distinctive[]" value="{{$distinctive}}" id="inputName" type="text" placeholder="Преимущество">
                                    <button class="btn btn-danger" onclick="rowDelete('distinctive_{{$k}}')" type="button">-</button>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="inputPassword4">Холд</label>
                            <input class="form-control" name="hold" value="{{$offer->hold}}" id="inputPassword4" type="text" placeholder="24 часа">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="inputPassword4">Направление</label>
                            <input class="form-control" name="vector" value="{{$offer->vector}}" id="inputPassword4" type="text" placeholder="Ремонт БТ">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="inputPassword4">Цель</label>
                            <input class="form-control" name="target" value="{{$offer->target}}" id="inputPassword4" type="text" placeholder="Оплаченный заказ">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="inputPassword4">Вознаграждение вебматеру</label>
                            <input class="form-control" name="price" value="{{$offer->price}}" id="inputPassword4" type="text" placeholder="1000">
                        </div>

{{--                        <form action="{{route('adv.offers.add.file', $offer->id)}}" method="POST" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
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
                            @if($offer->approved == true)
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Обновить</button>
                                </div>
                            @else
                                <div class="alert alert-warning">
                                    Оффер на рассмотрении, в данный момент вы не можете его изменять
                                </div>
                            @endif
                            @if($offer->approved == true)</form>@endif
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
                url : "/dashboard/offers/delete-file/",
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
