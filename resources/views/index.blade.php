<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Главная</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="author" content="Shreethemes" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="website" content="https://shreethemes.in" />
    <meta name="Version" content="v3.8.0" />
    <!-- favicon -->
    <link rel="shortcut icon" href="/landing/images/favicon.ico">
    <!-- Bootstrap -->
    <link href="/landing/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- tobii css -->
    <link href="/landing/css/tobii.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="/landing/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <!-- Slider -->
    <link rel="stylesheet" href="/landing/css/tiny-slider.css"/>
    <!-- Main Css -->
    <link href="/landing/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
{{--    <link href="/landing/css/colors/default.css" rel="stylesheet" id="color-opt">--}}
    <link href="/landing/css/colors/yellow.css" rel="stylesheet" id="color-opt">

    <style>
        .blog .position-relative .card-img-top{
            max-height: 237px;
        }
    </style>

</head>

<body>
<!-- Loader -->
<!-- <div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div> -->
<!-- Loader -->

<!-- Navbar STart -->
<a href="" id="index"></a>
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="logo" href="/">
                    <span class="logo-light-mode">
                        <img src="/assets/images/logo/logo-svg.svg" class="l-dark" height="64" alt="">
                        <img src="/assets/images/logo/logo-svg.svg" class="l-light" height="64" alt="">
                    </span>
            <img src="/assets/images/logo/logo-svg.svg" height="64" class="logo-dark-mode" alt="">
        </a>

        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <!--Login button Start-->
        <ul class="buy-button list-inline mb-0">
            <!-- <li class="list-inline-item mb-0">
                <div class="dropdown">
                    <button type="button" class="btn btn-link text-decoration-none dropdown-toggle p-0 pe-2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil uil-search text-muted"></i>
                    </button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 py-0" style="width: 300px;">
                        <form>
                            <input type="text" id="text" name="name" class="form-control border bg-white" placeholder="Search...">
                        </form>
                    </div>
                 </div>
            </li> -->


            <li class="list-inline-item ps-1 mb-0">
                <a href="{{route('login')}}" target="_blank">
                    <div class="btn btn-icon btn-pills btn-primary"><i data-feather="log-in" class="fea icon-sm"></i></div>
                </a>
            </li>
        </ul>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light">
                <li><a href="#index" class="sub-menu-item">Главная</a></li>
                <li><a href="#about" class="sub-menu-item">О нас</a></li>
                <li><a href="#advantages" class="sub-menu-item">Преимущества</a></li>
                <li><a href="#offers" class="sub-menu-item">Офферы</a></li>
                <li><a href="#contacts" class="sub-menu-item">Контакты</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->

<!-- Hero Start -->
{{--<section class="bg-half-170 d-table w-100 it-home" style="background: url('/landing/images/it/bg1.jpg') center center;">--}}
<section class="bg-half-170 d-table w-100 it-home" style="background: url('/landing/bg.jpg') center center;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6 col-12">
                <div class="title-heading">
                    <h6 class="text-white-50">Upgrade</h6>
                    <h1 class="fw-bold text-white title-dark mt-2 mb-3">CPA-сеть в сфере услуг, где каждое действие приносит прибыль!</h1>

                    <div class="row text-white">
                        <div class="col">
                            <i data-feather="cast" class="fea icon-sm"></i>
{{--                            <i data-feather="cast" class="fea icon-sm"></i>--}}
{{--                            Ремонт бытовой техники--}}
                            Дезинсекция
                        </div>
                        <div class="col">
                            <i data-feather="tv" class="fea icon-sm"></i>
                            Мастер на час*
                        </div>
                    </div>

                    <div class="row text-white">
                        <div class="col">
                            <i data-feather="tool" class="fea icon-sm"></i>
                            Сборка мебели*
{{--                            Муж на час--}}
                        </div>
                        <div class="col">
                            <i data-feather="speaker" class="fea icon-sm"></i>
                            Ремонт бытовой техники*
                        </div>
                    </div>

{{--                    <div class="mt-4 pt-2">--}}
{{--                        <a href="javascript:void(0)" class="btn btn-primary m-1"><i class="uil uil-phone"></i> Свяжитесь с нами</a>--}}
{{--                    </div>--}}
                </div>
            </div><!--end col-->

            <div class="col-lg-5 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="card shadow rounded border-0 ms-lg-5">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Регистрация</h5>
                        <!-- <h6>We here to help you 24/7 with experts</h6> -->

                        @if ($errors->any())
                            <div class="text-danger mb-3">{{$errors->first()}}</div>
                        @endif

                        <form class="login-form" method="POST" action="{{route('register')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Имя <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input type="text" value="{{old('name')}}" class="form-control ps-5" placeholder="Имя" name="name" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input type="email" value="{{old('email')}}" class="form-control ps-5" placeholder="mail@email.net" name="email" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Телефон <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                            <input type="number" value="{{old('phone')}}" name="phone" class="form-control ps-5" placeholder="+7(999)999-99-99" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Кто вы? <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <!-- <i data-feather="phone" class="fea icon-sm icons"></i> -->
                                            <select name="role_id" class="form-control" id="">
                                                <option value="2">Веб-мастер</option>
                                                <option value="3">Рекламодатель</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Пароль <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="hash" class="fea icon-sm icons"></i>
                                            <input type="password" class="form-control ps-5" placeholder="********" name="password" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Повторите пароль <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="hash" class="fea icon-sm icons"></i>
                                            <input type="password" class="form-control ps-5" placeholder="********" name="re-password" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Я принимаю <a href="#" class="text-primary">Правила и условия</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">Зарегистрироваться</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<!-- End Hero -->

<!-- Start Features -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="d-flex features pt-4 pb-4">
                    <div class="icon text-center rounded-circle text-primary me-3 h5 mb-0">
                        <i class="uil uil-analytics text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title">Выгодные офферы</h4>
{{--                        <p class="text-muted para mb-0">Composed in a pseudo-Latin language which.</p>--}}
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-6 col-12">
                <div class="d-flex features pt-4 pb-4">
                    <div class="icon text-center rounded-circle text-primary me-3 h5 mb-0">
                        <i class="uil uil-airplay text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title">Регулярно обновляем направления</h4>
{{--                        <p class="text-muted para mb-0">Composed in a pseudo-Latin language which.</p>--}}
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-6 col-12">
                <div class="d-flex features pt-4 pb-4">
                    <div class="icon text-center rounded-circle text-primary me-3 h5 mb-0">
                        <i class="uil uil-clapper-board text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title">Безлимитные выплаты</h4>
{{--                        <p class="text-muted para mb-0">Composed in a pseudo-Latin language which.</p>--}}
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-3 col-md-6 col-12">
                <div class="d-flex features pt-4 pb-4">
                    <div class="icon text-center rounded-circle text-primary me-3 h5 mb-0">
                        <i class="uil uil-users-alt text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title">Выплата по СРА</h4>
{{--                        <p class="text-muted para mb-0">Composed in a pseudo-Latin language which.</p>--}}
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Features -->

<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                        <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                            <div class="card-body p-0">
                                <img src="/landing/rec.jpg" class="img-fluid" alt="work-image">
                                <div class="overlay-work bg-dark"></div>
                                <div class="content">
                                    <a href="javascript:void(0)" class="title text-white d-block fw-bold">Прямой рекламодатель</a>
                                    <!-- <small class="text-light">IT & Software</small> -->
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-6 col-6">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                    <div class="card-body p-0">
                                        <img src="/landing/hold.jpg" class="img-fluid" alt="work-image">
                                        <div class="overlay-work bg-dark"></div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="title text-white d-block fw-bold">Холд всего 24 часа</a>
                                            <!-- <small class="text-light">Engineering</small> -->
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                <div class="card work-container work-modern overflow-hidden rounded border-0 shadow-md">
                                    <div class="card-body p-0">
                                        <img src="/landing/auto.jpg" class="img-fluid" alt="work-image">
                                        <div class="overlay-work bg-dark"></div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="title text-white d-block fw-bold">Полная автоматизация</a>
                                            <!-- <small class="text-light">C.A.</small> -->
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->

            <div class="col-lg-6 col-md-6 mt-4 mt-lg-0 pt- pt-lg-0">
                <a href="" id="about"></a>
                <div class="ms-lg-4">
                    <div class="section-title">
                        <h4 class="title mb-4 mt-3">Наши преимущества</h4>
                        <!-- <p class="text-muted para-desc">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        <p class="text-muted para-desc mb-0">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. Lorem Ipsum is composed in a pseudo-Latin language which more or less corresponds to 'proper' Latin. It contains a series of real Latin words.</p> -->
                    </div>

                    <div class="d-flex mt-4 pt-2">
                        <i class="uil uil-bullseye h5 text-primary"></i>
                        <div class="flex-1 ms-2">
                            <h5>Высокая конверсия</h5>
                            <p class="mb-0 text-muted">
                                Конверсия в подтвержденную заявку в среднем 70-80% в зависимости от источника
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mt-4 pt-2">
                        <i class="uil uil-create-dashboard h5 text-primary"></i>
                        <div class="flex-1 ms-2">
                            <h5>Полностью автоматизированный личный кабинет</h5>
                            <p class="mb-0 text-muted">
                                Оплачиваем заявку даже в случае отказа клиента от оплаты.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mt-4 pt-2">
                        <i class="uil uil-create-dashboard h5 text-primary"></i>
                        <div class="flex-1 ms-2">
                            <h5>Выплаты до 1500 рублей за заказ</h5>
                            <p class="mb-0 text-muted">
                                Вывод средств на карту 1 раз в неделю, суммы от 1000 рублей. Комиссия за наш счет.
                            </p>
                        </div>
                    </div>

                    <!-- <div class="mt-4 pt-2">
                        <a href="#" target="_blank" class="btn btn-primary m-1">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                    </div> -->
                </div>
            </div>
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Наши условия</h4>
                    <!-- <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p> -->
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="d-flex key-feature align-items-center p-3 rounded-pill shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="dollar-sign" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Выводы без комиссии</h4>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="d-flex key-feature align-items-center p-3 rounded-pill shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="phone" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Собственный Call-центр</h4>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="d-flex key-feature align-items-center p-3 rounded-pill shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="bar-chart" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Любой тип трафика</h4>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="d-flex key-feature align-items-center p-3 rounded-pill shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="pie-chart" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Прозрачная статистика</h4>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="d-flex key-feature align-items-center p-3 rounded-pill shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="phone-forwarded" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Оперативная поддержка</h4>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="d-flex key-feature align-items-center p-3 rounded-pill shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="grid" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Принимаем лиды любым способом</h4>
                    </div>
                </div>
            </div><!--end col-->



            <!-- <div class="col-12 mt-4 pt-2 text-center">
                <a href="javascript:void(0)" class="btn btn-primary">See More <i class="uil uil-angle-right"></i></a>
            </div> -->
            <!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->
<a href="" id="advantages"></a>
<!-- Start -->
<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="video-solution-cta position-relative" style="z-index: 1;">
                    <div class="position-relative py-5 rounded" style="">
                        <div class="bg-overlay rounded bg-primary bg-gradient" style="opacity: 0.8;"></div>

                        <div class="row">
                            <div class="col-lg-6 col-6 my-6">
                                <div class="counter-box text-center px-lg-6">
                                    <i class="uil uil-users-alt text-white-50 h2"></i>
                                    <h1 class="mb-0 text-white">До <span class="counter-value" data-target="80">10</span>%</h1>
                                    <h6 class="counter-head text-white-50">Высокая конверсия</h6>
                                </div><!--end counter box-->
                            </div><!--end col-->

{{--                            <div class="col-lg-4 col-6 my-4">--}}
{{--                                <div class="counter-box text-center px-lg-4">--}}
{{--                                    <i class="uil uil-schedule text-white-50 h2"></i>--}}
{{--                                    <h1 class="mb-0 text-white"><span class="counter-value" data-target="25000">22004</span>+</h1>--}}
{{--                                    <h6 class="counter-head text-white-50">Эженедельные выплаты</h6>--}}
{{--                                </div><!--end counter box-->--}}
{{--                            </div><!--end col-->--}}

                            <div class="col-lg-6 col-6 my-6">
                                <div class="counter-box text-center px-lg-6">
                                    <i class="uil uil-file-check-alt text-white-50 h2"></i>
                                    <h1 class="mb-0 text-white">Широкая <br> география <span class="counter-value" data-target="100">80</span>+</h1>
                                    <h6 class="counter-head text-white-50">Городов</h6>
                                </div><!--end counter box-->
                            </div><!--end col-->


                        </div><!--end row-->
                    </div>


                </div>
            </div><!--end col-->
        </div><!--end row -->
        <div class="feature-posts-placeholder bg-light"></div>
    </div><!--end container-->
</section><!--end section-->
<!-- End section -->

<!-- Start -->
<section class="section">
    <a href="" id="offers"></a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Офферы</h4>
                    <!-- <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p> -->
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="/landing/remont.png" class="card-img-top rounded-top" alt="...">
                        <div class="overlay rounded-top"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="javascript:void(0)" class="card-title title text-dark">Ремонт крупной бытовой техники</a></h5>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <a href="#" class="text-muted readmore">Открыть оффер <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
{{--                    <div class="author">--}}
{{--                        <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>--}}
{{--                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>--}}
{{--                    </div>--}}
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="/landing/dezinfekciya-500x410.jpg" class="card-img-top rounded-top" alt="...">
                        <div class="overlay rounded-top"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="javascript:void(0)" class="card-title title text-dark">Дезинсекция</a></h5>
                        <div class="post-meta d-flex justify-content-between mt-3">

                            <a href="#" class="text-muted readmore">Открыть оффер <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
{{--                    <div class="author">--}}
{{--                        <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>--}}
{{--                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>--}}
{{--                    </div>--}}
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="/landing/sborka.jpg" class="card-img-top rounded-top" alt="...">
                        <div class="overlay rounded-top"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="javascript:void(0)" class="card-title title text-dark">Сборка мебели</a></h5>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <a href="#" class="text-muted readmore">Открыть оффер <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
{{--                    <div class="author">--}}
{{--                        <small class="text-light user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>--}}
{{--                        <small class="text-light date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>--}}
{{--                    </div>--}}
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->


<section class="section">
    <a href="" id="contacts"></a>
    <div class="container">
        <div class="row justify-content-center">
            <h3>Присоединяйся к нам</h3>
            <div class="row" style="gap: 10px">
                <input type="text" class="form-control ps-5 col" placeholder="Имя" name="s" required="">
                <input type="text" class="form-control ps-5 col" placeholder="mail@email.com" name="s" required="">
            </div>
            <div class="row mb-3 mt-3" style="gap: 10px">
                <input type="text" class="form-control ps-5 col" placeholder="+7(999)-999-99-99" name="s" required="">
                <select name="role_id" class="form-control ps-5 col" id="">
                    <option value="1">Веб-мастер</option>
                    <option value="2">Рекламодатель</option>
                </select>
            </div>
            <button class="btn btn-primary">Зарегистрироваться</button>
        </div>
    </div>
</section>


<!-- End -->

<!-- Footer Start -->
{{--<footer class="footer">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="footer-py-60">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">--}}
{{--                            <a href="#" class="logo-footer">--}}
{{--                                <img src="/assets/images/logo/logo-svg.svg" height="24" alt="">--}}
{{--                            </a>--}}
{{--                            <!-- <p class="mt-4">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>--}}
{{--                            <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">--}}
{{--                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>--}}
{{--                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>--}}
{{--                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>--}}
{{--                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>--}}
{{--                            </ul> -->--}}
{{--                            <!--end icon-->--}}
{{--                        </div><!--end col-->--}}

{{--                        <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">--}}
{{--                            <!-- <h5 class="footer-head">Company</h5>--}}
{{--                            <ul class="list-unstyled footer-list mt-4">--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> About us</a></li>--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Services</a></li>--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Team</a></li>--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Pricing</a></li>--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Project</a></li>--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Careers</a></li>--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Blog</a></li>--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Login</a></li>--}}
{{--                            </ul> -->--}}
{{--                        </div><!--end col-->--}}

{{--                        <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">--}}
{{--                            <!-- <h5 class="footer-head">Usefull Links</h5>--}}
{{--                            <ul class="list-unstyled footer-list mt-4">--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Terms of Services</a></li>--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Privacy Policy</a></li>--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Documentation</a></li>--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Changelog</a></li>--}}
{{--                                <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Components</a></li>--}}
{{--                            </ul> -->--}}
{{--                        </div><!--end col-->--}}

{{--                        <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">--}}
{{--                            <!-- <h5 class="footer-head">Newsletter</h5>--}}
{{--                            <p class="mt-4">Sign up and receive the latest tips via email.</p>--}}
{{--                            <form>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <div class="foot-subscribe mb-3">--}}
{{--                                            <label class="form-label">Write your email <span class="text-danger">*</span></label>--}}
{{--                                            <div class="form-icon position-relative">--}}
{{--                                                <i data-feather="mail" class="fea icon-sm icons"></i>--}}
{{--                                                <input type="email" name="email" id="emailsubscribe" class="form-control ps-5 rounded" placeholder="Your email : " required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <div class="d-grid">--}}
{{--                                            <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary" value="Subscribe">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form> -->--}}
{{--                        </div><!--end col-->--}}
{{--                    </div><!--end row-->--}}
{{--                </div>--}}
{{--            </div><!--end col-->--}}
{{--        </div><!--end row-->--}}
{{--    </div><!--end container-->--}}

{{--    <div class="footer-py-30 footer-bar">--}}
{{--        <div class="container text-center">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <div class="text-sm-start">--}}
{{--                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script></p>--}}
{{--                    </div>--}}
{{--                </div><!--end col-->--}}

{{--                <!-- <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">--}}
{{--                    <ul class="list-unstyled text-sm-end mb-0">--}}
{{--                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="/landing/images/payments/american-ex.png" class="avatar avatar-ex-sm" title="American Express" alt=""></a></li>--}}
{{--                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="/landing/images/payments/discover.png" class="avatar avatar-ex-sm" title="Discover" alt=""></a></li>--}}
{{--                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="/landing/images/payments/master-card.png" class="avatar avatar-ex-sm" title="Master Card" alt=""></a></li>--}}
{{--                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="/landing/images/payments/paypal.png" class="avatar avatar-ex-sm" title="Paypal" alt=""></a></li>--}}
{{--                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="/landing/images/payments/visa.png" class="avatar avatar-ex-sm" title="Visa" alt=""></a></li>--}}
{{--                    </ul>--}}
{{--                </div> -->--}}
{{--                <!--end col-->--}}
{{--            </div><!--end row-->--}}
{{--        </div><!--end container-->--}}
{{--    </div>--}}
{{--</footer><!--end footer-->--}}
<!-- Footer End -->

<!-- Offcanvas Start -->
<div class="offcanvas offcanvas-end bg-white shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header p-4 border-bottom">
        <h5 id="offcanvasRightLabel" class="mb-0">
            <img src="/assets/images/logo/logo-svg.svg" height="24" class="light-version" alt="">
            <img src="/assets/images/logo/logo-svg.svg" height="24" class="dark-version" alt="">
        </h5>
        <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-times fs-4"></i></button>
    </div>
    <div class="offcanvas-body p-4">
        <div class="row">
            <div class="col-12">
                <img src="/landing/images/contact.svg" class="img-fluid d-block mx-auto" style="max-width: 256px;" alt="">
                <div class="card border-0 mt-5" style="z-index: 1">
                    <div class="card-body p-0">
                        <form method="post" name="myForm" onsubmit="return validateForm()">
                            <p id="error-msg" class="mb-0"></p>
                            <div id="simple-msg"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input name="name" id="name" type="text" class="form-control ps-5" placeholder="Name :">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Email :">
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Subject</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="book" class="fea icon-sm icons"></i>
                                            <input name="subject" id="subject" class="form-control ps-5" placeholder="subject :">
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Comments <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                            <textarea name="comments" id="comments" rows="4" class="form-control ps-5" placeholder="Message :"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>

    <div class="offcanvas-footer p-4 border-top text-center">
        <ul class="list-unstyled social-icon social mb-0">
            <li class="list-inline-item mb-0"><a href="https://1.envato.market/4n73n" target="_blank" class="rounded"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
            <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://shreethemes.in" target="_blank" class="rounded"><i class="uil uil-globe align-middle" title="website"></i></a></li>
        </ul><!--end icon-->
    </div>
</div>
<!-- Offcanvas End -->

<!-- Cookies Start -->
<!-- <div class="cookie-popup bg-white shadow rounded py-3 px-4">
    <p class="text-muted mb-0">This website uses cookies to provide you with a great user experience. By using it, you accept our <a href="https://shreethemes.in" target="_blank" class="text-success h6">use of cookies</a></p>
    <div class="cookie-popup-actions text-end">
        <button><i class="uil uil-times text-dark fs-4"></i></button>
    </div>
</div> -->
<!--Note: Cookies Js including in plugins.init.js (path like; js/plugins.init.js) and Cookies css including in _helper.scss (path like; scss/_helper.scss)-->
<!-- Cookies End -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
<!-- Back to top -->

<!-- Style switcher -->
<div id="style-switcher" class="bg-light border p-3 pt-2 pb-2" onclick="toggleSwitcher()">
    <div>
        <h6 class="title text-center">Select Your Color</h6>
        <ul class="pattern">
            <li class="list-inline-item">
                <a class="color1" href="javascript: void(0);" onclick="setColor('default')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color2" href="javascript: void(0);" onclick="setColor('green')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color3" href="javascript: void(0);" onclick="setColor('purple')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color4" href="javascript: void(0);" onclick="setColor('red')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color5" href="javascript: void(0);" onclick="setColor('skyblue')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color6" href="javascript: void(0);" onclick="setColor('skobleoff')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color7" href="javascript: void(0);" onclick="setColor('cyan')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color8" href="javascript: void(0);" onclick="setColor('slateblue')"></a>
            </li>
            <li class="list-inline-item">
                <a class="color9" href="javascript: void(0);" onclick="setColor('yellow')"></a>
            </li>
        </ul>

        <h6 class="title text-center pt-3 mb-0 border-top">Theme Option</h6>
        <ul class="text-center list-unstyled">
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary rtl-version t-rtl-light mt-2" onclick="setTheme('style-rtl')">RTL</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary ltr-version t-ltr-light mt-2" onclick="setTheme('style')">LTR</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary dark-rtl-version t-rtl-dark mt-2" onclick="setTheme('style-dark-rtl')">RTL</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary dark-ltr-version t-ltr-dark mt-2" onclick="setTheme('style-dark')">LTR</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-dark dark-version t-dark mt-2" onclick="setTheme('style-dark')">Dark</a></li>
            <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-dark light-version t-light mt-2" onclick="setTheme('style')">Light</a></li>
        </ul>

        <h6 class="title text-center pt-3 mb-0 border-top">Admin</h6>
        <ul class="text-center list-unstyled mb-0">
            <li><a href="javascript:void(0)" target="_blank" class="btn btn-sm btn-block btn-success mt-2">Admin Dashboard</a></li>
        </ul>
    </div>
{{--     <div class="bottom">--}}
{{--        <a href="javascript: void(0);" class="settings bg-white title-bg-dark shadow d-block"><i class="mdi mdi-cog ms-1 mdi-24px position-absolute mdi-spin text-primary"></i></a>--}}
{{--    </div>--}}
</div>
<!-- end Style switcher -->

<!-- javascript -->
<script src="/landing/js/bootstrap.bundle.min.js"></script>
<!-- SLIDER -->
<script src="/landing/js/tiny-slider.js "></script>
<!-- tobii js -->
<script src="/landing/js/tobii.min.js "></script>
<!-- Icons -->
<script src="/landing/js/feather.min.js"></script>
<!-- Switcher -->
<script src="/landing/js/switcher.js"></script>
<!-- Main Js -->
<script src="/landing/js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
<script src="/landing/js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
</body>
</html>
