<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script crossorigin src="https://unpkg.com/react@15/dist/react.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@15/dist/react-dom.js"></script>
    <script src="https://npmcdn.com/babel-core@5.8.38/browser.min.js"></script>
    <script src="https://soulwire.github.io/sketch.js/js/sketch.min.js"></script>

    <link href={{asset('css/dropzone.css')}} rel="stylesheet">
    <link href={{asset('css/style.css')}} rel="stylesheet">
    <link href={{asset('css/mystyle.css')}} rel="stylesheet">

    {{--    @push('scripts')--}}
    {{--    <script type="text/babel" src={{asset('reactComponents/components.js')}}> </script>--}}

    {{--    @endpush--}}
    <title>Document</title>
</head>
<body>

{{--{{dd($dataArrayForDropDown['gender'])}}--}}
<div class="header">
    <div class="container">
        <a href="https://gsb.almau.edu.kz/"><img src="{{asset('img/logo-gsb.png')}}" alt=""></a>
    </div>
</div>
<div id="message"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 header_title">
            <h2>Добро пожаловать на портал регистрации на программу MBA</h2>

            <p>Благодарим Вас за интерес к программам MBA в Высшей Школе Бизнеса AlmaU. </p>
            <p style="margin-top: -50px">Вы собираетесь начать процесс подачи заявки, который предназначен для
                поступления.</p>
            <p style="margin-top: -50px">Заявка необходима включать Ваши предыдущие академические и профессиональные
                достижения,
                а также соответствовать документам (удостоверение личности, адрес регистрации, диплом, сертификат и
                т.д.)</p>
            <p style="margin-top: -50px">После того, как Ваше заявление будет отправлено, будет открыт доступ на сдачу
                вступительных тестов.
                Кандидаты на программу MBA должны продемонстрировать свои знания по менеджменту, критическому мышлению,
                а также
                уровень знания английского языка.</p>
            <!--    <p style="margin-top: -50px">Если в процессе подачи заявки у Вас возникнут какие-либо вопросы, пожалуйста, свяжитесь с нашей  командой по телефону или электронной почте</p>-->
            <!--    <p style="margin-top: -50px">Телефон: +7 727 313 30 78 </p>-->
            <!--    <p style="margin-top: -70px">E-mail: gsb@almau.edu.kz </p>-->

        </div>
    </div>
</div>
<script>
    let dataArrayForDropDown = null;
    @isset($dataArrayForDropDown)
      let dataArrayForDropDown ={!!json_encode($dataArrayForDropDown)!!};
    @endisset

    let programMBA = null;
    @isset($programMBA)
        programMBA ={!!json_encode($programMBA)!!};
    console.log(programMBA)
    @endisset
    // console.log(dataArrayForDropDown);
</script>
<div class="container">
    <div class="row">
        {{--        {{dd(json_encode($dataArrayForDropDown['gender']))}}--}}
        <div id="tabs" class=" tabs_head">

            <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: gainsboro;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="1-tab" data-bs-toggle="tab" data-bs-target="#tabs-1"
                            type="button"
                            role="tab" aria-controls="home" aria-selected="true">Личные данные
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="2-tab" data-bs-toggle="tab" data-bs-target="#tabs-2"
                            type="button"
                            role="tab" aria-controls="profile" aria-selected="false">Сведения о трудовой деятельности
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="3-tab" data-bs-toggle="tab" data-bs-target="#tabs-3"
                            type="button"
                            role="tab" aria-controls="contact" aria-selected="false">Профиль
                    </button>
                </li>
            </ul>
            <div class="form" style="background-color: white">
                <!---не меняйте action на 3 сабмит, он у вас неправильно работет(данные у нас на базе 2 раза сохраняется)--->
{{--                @php--}}
{{--                   $e = Illuminate\Support\Facades\Hash::make('qwe123')--}}
{{--                @endphp--}}
{{--                {{$e}}--}}
                <form id="basic-form" method="post" class="needs-validation" novalidate enctype="multipart/form-data" action="{{route('send')}}">
                    @csrf
                    <div class="tab-content" id="myTabContent">
                        <script src={{asset('js/app.js')}} type="text/javascript"></script>
                    </div>
                    <div class="col-lg-12">
                        <div class="row ">
                            <div class="d-flex justify-content-center">
                                <div class="col-lg-11">
                                    <div class=" ">
                                        <p style="color: #245cbc">Мы в социальных сетях</p>
                                    </div>
                                    <div class="d-lg-flex justify-content-between">

                                        <div class="col-lg-3  d-flex  justify-content-start  ">

                                            <div class="col-lg-12 ">

                                                <div><a style="text-decoration: none; color: #1a202c"
                                                        href="https://www.instagram.com/gsb.almau">Instagram</a></div>
                                                <div><a style="text-decoration: none;color: #1a202c"
                                                        href="https://www.youtube.com/c/GSBAlmaU">Youtube</a></div>

                                                <div><a style="text-decoration: none;color: #1a202c"
                                                        href="https://www.facebook.com/gsb.almau">Facebook</a></div>

                                                <div><a style="text-decoration: none;color: #1a202c"
                                                        href="https://www.linkedin.com/school/gsb.almau">LinkedIn</a>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-lg-5 d-flex justify-content-center">
                                            <div class="col-lg-6">
                                                <img class="img-fluid" src="{{asset('img/logo-gsb.png')}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 d-lg-flex justify-content-end ">
                                            <div>
                                                <div class="footer-text">ул. Розыбакиева, 227</div>
                                                <div class="footer-text">Алматы, 050060, Казахстан</div>
                                                <div class="footer-text">Телефон: +7 727 313 30 78</div>
                                                <div class="footer-text"><a style="color: #004282"
                                                                            href="mailto:gsb@almau.edu.k">E-mail:
                                                        gsb@almau.edu.kz</a></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>




