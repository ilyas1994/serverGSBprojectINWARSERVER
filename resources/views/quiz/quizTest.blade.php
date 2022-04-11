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
    <title>Document</title>
</head>

<body >
{{--@dd($all)--}}


<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <div class="d-flex flex-grow-1">
                <span class="w-100 d-lg-none d-block"></span>
                <a  class="navbar-brand d-none d-lg-inline-block" href="http://almau.edu.kz">
                    <img style="width: 150px; height: 100px" src="http://mastertest.almau.edu.kz/images/new_logo.png" alt="logo">
                </a>
                <a style="width: 150px" class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="#">
                    <img  src="http://mastertest.almau.edu.kz/images/new_logo.png" alt="logo">
                </a>
                <div class="w-100 text-right">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>

            <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
                <ul class="navbar-nav ml-auto flex-nowrap">
                    <li class="nav-item">
                        <!-- <a href="" class="nav-link m-1 menu-item">Результаты</a> -->
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{route('home')}}" class="nav-link m-1 menu-item">Тесты</a>--}}
{{--                    </li>--}}

                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title"></h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6></h6>
                <p>Кол-о вопросов: <span class="modal_question">50</span> <br> Время: <span>60 мин</span></p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary">Начать тест</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="row">
        <div style="background-color:white; border:1px solid red; padding:10px 20px;margin-bottom:30px;">
            <p>Инструкции по очистке кеша для нескольких основных браузеров описаны ниже:</p>
            <p>Google Chrome:  1. Выберите Настройки в меню браузера -> «Конфиденциальность и безопасность» нажмите Очистить историю</p>
            <p>Firefox:  1. Выберите «Инструменты» (Tools) -> Стереть недавнюю историю (Clear Private Data). 2. Убедитесь в том, что стоит "галочка" напротив Cache и нажмите «Очистить сейчас» (Clear Private Data Now).</p>
            <p>Safari: 1. Выберите Safari -> Очистить кэш (Empty Cache). 2. Нажмите «Очистить»(Empty).</p>
        </div>

{{--@dd(json_encode($all))--}}
        <div  id="quizSelect" class="col-lg-12 mb-5">
              @csrf
            <script>

                let question = null;
                let csrf = "{!! csrf_token() !!}";

                @isset($all)
                    {{--question ={!!json_encode($all)!!};--}}
                    question ={!! json_encode($all) !!};
                console.log(question)
                @endisset
                let testRoutes = "{{route('quiz_res')}}";
            </script>
            <script src={{asset('js/quiz/app.js')}} type="text/javascript"> </script>
        </div>
    </div>
</div>

</body>
</html>