<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Просмотр звонка</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/date-picker.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link id="color" rel="stylesheet" href="/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css">
    @yield('meta')
    <script src="https://unpkg.com/imask"></script>
</head>
<body onload="startTime()">
<div class="loader-wrapper">
    <div class="loader-index"><span></span></div>
    <svg>
        <defs></defs>
        <filter id="goo">
            <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
            <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
    </svg>
</div>
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-header">
        <div class="header-wrapper row m-0">
            <form class="form-inline search-full col" action="#" method="get">
                <div class="form-group w-100">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                            {{--                            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>--}}
                        </div>
                        <div class="Typeahead-menu"></div>
                    </div>
                </div>
            </form>
            <div class="header-logo-wrapper col-auto p-0">
                <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="/assets/images/logo/logo.png" alt=""></a></div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
            </div>
            <div class="left-header col horizontal-wrapper ps-0">

            </div>
            <div class="nav-right col-8 pull-right right-header p-0">
                <ul class="nav-menus">
{{--                    <li>--}}
{{--                        0 P--}}
{{--                    </li>--}}
{{--                    <li class="onhover-dropdown">--}}
{{--                        <div class="notification-box"><i data-feather="bell"> </i><span class="badge rounded-pill badge-secondary" id="notification_count">{{Auth()->User()->notifications()->count()}}</span></div>--}}
{{--                        @include('inc.notifications')--}}
{{--                    </li>--}}
                    <li>
                        <div class="mode"><i class="fa fa-moon-o"></i></div>
                    </li>
                    <li class="profile-nav onhover-dropdown p-0 me-0">
                        <div class="media profile-media"><img class="b-r-10" src="/assets/images/dashboard/profile.jpg" alt="">
                            <div class="media-body"><span>{{Auth()->user()->name}}</span>
                                <p class="mb-0 font-roboto">{{Auth()->user()->role->name}} <i class="middle fa fa-angle-down"></i></p>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                            <li><a href="#"><i data-feather="user"></i><span>Профиль </span></a></li>
                            <li><a href="#"><i data-feather="settings"></i><span>Настройки</span></a></li>
                            <li><a href="{{route('logout')}}"><i data-feather="log-in"> </i><span>Выйти</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <script class="result-template" type="text/x-handlebars-template">
                <div class="ProfileCard u-cf">
                    <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                    <div class="ProfileCard-details">
                        <div class="ProfileCard-realName">Name</div>
                    </div>
                </div>
            </script>
            <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
            <div>
                <div class="logo-wrapper">
                    <a href="/">
                        <img class="img-fluid for-light" src="/assets/images/logo.svg" alt="">
                        <img class="img-fluid for-dark" src="/assets/images/logo.svg" alt="">
                    </a>
                    <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                </div>
                <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="/assets/images/logo/logo-icon.png" alt=""></a></div>
                @include('navbars.'.Auth()->user()->role->tech_name)
            </div>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h3>Просмотр звонка</h3>
                        </div>
                        {{--                        <div class="col-6">--}}
                        {{--                            <ol class="breadcrumb">--}}
                        {{--                                <li class="breadcrumb-item"><a href="/"><i data-feather="home"></i></a></li>--}}
                        {{--                                <li class="breadcrumb-item">Dashboard</li>--}}
                        {{--                                <li class="breadcrumb-item active">Default</li>--}}
                        {{--                            </ol>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
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
                            <form class="row g-3" id="acceptForm" method="POST" action="{{route('operator.call.approve', $call->id)}}">
                                @csrf
                                <div class="col-md-12">
                                    <label class="form-label" for="inputEmail4">Оффер*</label>
                                    <input type="text" disabled value="{{$call->offer_name}}" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="inputEmail4">Мастер*</label>
                                    <input type="text" disabled value="{{$call->master_name}}" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="inputName">Телефон</label>
                                    <input type="text" class="form-control" disabled value="{{$call->number_from}}" id="phoneNumber" name="phone">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="inputName">Имя клиента</label>
                                    <input class="form-control" name="name" value="{{old('name')}}" id="inputName" type="text" placeholder="Имя">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="inputEmail4">Город клиента</label>
                                    <input class="form-control" value="{{old('city')}}" name="city" id="inputEmail4" type="text" placeholder="Город">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label" for="inputEmail5">Адрес клиента</label>
                                    <input class="form-control" value="{{old('address')}}" name="address" id="inputEmail5" type="text" placeholder="Адрес">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label" for="inputEmail2">Комментарий</label>
                                    <textarea name="comment" class="form-control" id="inputEmail2" cols="30" rows="10">{{old('comment')}}</textarea>
                                </div>

                                <div class="col-12">
                                    <label class="col-form-label" for="cleave-date1">Дата на которую договорились</label>
                                    <input class="form-control" name="date" id="cleave-date1" type="text" placeholder="ДД-ММ-ГГГГ" value="{{\Carbon\Carbon::parse(old('date'))->format('d-m-Y')}}">
                                </div>

                                <div class="col-12">
                                    <label class="col-form-label" for="cleave-time2">Время на которое договорились</label>
                                    <input class="form-control" name="time" id="cleave-time2" type="text" placeholder="ЧЧ:ММ" value="{{old('time')}}">
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary acceptBtn" type="button">Принять</button>
                                </div>
                            </form>
                            <form action="{{route('operator.call.cancel', $call->id)}}" id="cancelForm">
                                <div class="col-12">
                                    <button class="btn btn-danger mt-2 cancelBtn" type="button">Отклонить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright {{date('Y')}} ©</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- latest jquery-->
<script src="/assets/js/jquery-3.5.1.min.js"></script>
<!-- Bootstrap js-->
<script src="/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="/assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="/assets/js/scrollbar/simplebar.js"></script>
<script src="/assets/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="/assets/js/config.js"></script>
<!-- Plugins JS start-->
<script src="/assets/js/sidebar-menu.js"></script>
<script src="/assets/js/chart/chartist/chartist.js"></script>
<script src="/assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="/assets/js/chart/knob/knob.min.js"></script>
<script src="/assets/js/chart/knob/knob-chart.js"></script>
<script src="/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="/assets/js/notify/bootstrap-notify.min.js"></script>
<script src="/assets/js/dashboard/default.js"></script>
<script src="/assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="/assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
<script src="/assets/js/typeahead/handlebars.js"></script>
<script src="/assets/js/typeahead/typeahead.bundle.js"></script>
<script src="/assets/js/typeahead/typeahead.custom.js"></script>
<script src="/assets/js/typeahead-search/handlebars.js"></script>
<script src="/assets/js/typeahead-search/typeahead-custom.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="/assets/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>
    new Cleave('#cleave-date1', {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
    });

    new Cleave('#cleave-time2', {
        time: true,
        timePattern: ['h', 'm']
    });

    $('.acceptBtn').click(function(){
        let conf = confirm();
        if(conf){
            $('#acceptForm').submit();
        }else{
            return false;
        }
    });

    $('.cancelBtn').click(function(){
        let conf = confirm();
        if(conf){
            $('#cancelForm').submit();
        }else{
            return false;
        }
    });
</script>
<script>
    $('#clearNotificationsBtn').click(function(){
        $.ajax({
            url: '{{route('clear.notifications')}}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                $('.notification-message').remove();
                $('#clearNotificationsBtn').remove();
                $('#notification_count').text('0');
            }
        });
    });

    IMask(document.getElementById('phoneNumber'), {
            mask: '+{7}(000)000-00-00'
        }
    );
</script>
<!-- login js-->
<!-- Plugin used-->
</body>
</html>
