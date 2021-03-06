<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('admincss.css') }}">
    <title>Document</title>

</head>

<body>



{{--@dd(auth()->user()->name)--}}

{{--@dd($profileData)--}}



<div class="col-sm-12 d-flex mt-2">


{{--    <div class="col-5 d-flex">--}}
        @if(auth()->user()->city == 'Алматы')
        @php
            $citys = ['Выберите','Алматы','Нур-Султан','Атырау','Актау','Актобе','Кызылорда','Шымкент'];
        @endphp

        <div class="col-2">
            <form id="sendForrmm" action="{{ route('switchCountry' ) }}" method="get">
{{--            <select onchange=switchCountry(this) class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">--}}


            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">

                <option onclick=switchSelect(this.value,)  name="city" value="Алматы">Алматы</option>
                <option onclick=switchSelect(this.value)  name="city2" value="Нур-Султан">Нур-Султан</option>
            </select>



           <input type="hidden" id="countryVal" name="countryVal">
                <input id="cityVal" type="hidden" name="city">
                <button type="submit" hidden></button>
            </form>
        </div>

            @endif



    <div class="col-5 justify-content-end d-flex align-items-center">

            <p class="pt-3 pe-3">Фильтр по</p>


        @isset($fail)
            <h3>fail</h3>
        @endisset

        @if (Session::has('asd'))
            @php
                $hidoption = Session::get('asd')['hiddenOption'];
                    $profileData = Session::get('asd')['data'];
            @endphp
            {{--        @dd($hidoption)--}}
        @endif

        @if (Session::has('profileData'))
            @php

                    $profileData = Session::get('profileData');
            @endphp
        @endif


{{--        </select>--}}


        <select id="selection" class="col-5 h-75  form-select" aria-label="Default select example">

            @if(isset($hidoption))


            @switch($hidoption)
                @case('0')
                <option selected name="name">Имени</option>
                <option name="surname">Фамилии</option>
                <option name="Iin">ИИН</option>
                @break

                @case('1')
                    <option name="name">Имени</option>
                    <option selected name="surname">Фамилии</option>
                    <option name="Iin">ИИН</option>
                @break

                @case('2')
                    <option name="name">Имени</option>
                    <option name="surname">Фамилии</option>
                    <option selected name="Iin">ИИН</option>
                @break


            @endswitch
            @else
                <option selected name="name">Имени</option>
                <option name="surname">Фамилии</option>
                <option  name="Iin">ИИН</option>
            @endif



        </select>


    </div>

{{--      вместе идут --}}
     <button class="btn btn-success"   onclick="document.getElementById('link').click() ">Экспорт Excel</button>
     <a id="link" hidden href={{route('excel')}}></a>
{{--      вместе идут --}}


    <div class="col-md-4 col-sm-4 align-items-center">
        <form id="forms" action="{{ route('searchParamams', 'name') }}" method="get">
            <input type="hidden" name="hiddenOption" id="hiddenOption">

            <div class="input-group">
                <input type="search" id="searchId" name="search" class="form-control form-control-lg" placeholder="Введите данные для поиска">
                <div class="input-group-append">
                    <button onclick="btnFormInput()" type="submit" class="btn btn-lg btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

        </form>
    </div>

</div>



<div class="col-12" id="trr">


@isset($profileData)
    @foreach($profileData as $value)

{{--checkBoxMBAProgram--}}


        <div class="col-12" >

        <table class="table">
            <thead >
                <tr>
                <th class="col-1" scope="col">ИИН</th>
                <th class="col-1" scope="col">Фамилия</th>
                <th class="col-1" scope="col">Имя</th>
                <th class="col-1" scope="col">Отчество</th>
                <th class="col-1" scope="col">email</th>
                <th class="col-1" scope="col">Телефон</th>
                <th class="col-2" scope="col">Документы</th>
                <th class="col-1" scope="col">Тест</th>
                <th class="col-1" scope="col">PDF</th>
                <th class="col-1" scope="col">Дата</th>
                <th class="col-1" scope="col">Скачать</th>

            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $value->Iin }}</th>
                    <td>{{ $value->surname }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->patronymic }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->mobileNumber }}</td>

                    <td>
                        {{--                    Показать  Резюме--}}
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->Iin, 'resumeFile']) }}">Резюме</a>
                        <br>
                        {{--                    Показать Удв--}}
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->Iin, 'scanFileDocument']) }}">Удв. личности</a>
                        {{--                    Показать Мотивационное эссе только на EXECUTIVE MBA--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->Iin, 'copyPassport']) }}">Коп. Паспорта</a>
                        {{--                    Копия паспорта (.pdf или .jpg, .png)--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->Iin, 'fileEsse']) }}">Мотивационное эссе</a>
                                                {{--Показать foto3x4--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->Iin, 'foto3x4']) }}">Фото 3х4</a>
                        {{--                    Показать Копия диплома о высшем образовании + приложения к диплому о высшем образовании (.pdf) --}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->Iin, 'fileScanDiplomWithApplication']) }}">Копия диплома + приложения </a>
                        {{--                    Показать Справка с места работы с указанием должности (.pdf)--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->Iin, 'scanFileCertificateFromWork']) }}">Справка с места работы</a>
                        {{--                    Показать Рекомендательных письма только на EXECUTIVE MBA null--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->Iin, 'recomentedLetter']) }}">Рекомендательные письма</a>
                        {{--                    Показать Медицинская справка (форма 075У)--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->Iin, 'medicalDoc']) }}">Медицинская справка</a>
                        {{--                    Показать Прикрепить скан сертификата (.pdf)--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->Iin, 'fileScanDiplomWithApplication']) }}">Сертиф. Англ. языка</a>
                        {{--                    Прикрепить скан сертификата на знание Английского языка (.pdf или .jpg)--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->Iin, 'scanCertificate']) }}">Скан сертификата</a>
                    </td>

{{--                        @dd($quizResult[1]->type_test)--}}

                        <td>
                            @if(isset($quizResult))
{{--                            @dd($quizResult)--}}
                            @for($i = 0; $i < count($quizResult); $i++)

                            {{--                        {{ ('Тесты еще не сданы')}}--}}
                        @if($quizResult[$i]->type_test == 1)
{{--                        <a target="_blank" href="{{ route('answerList', auth()->id(), $quizResult[$i]->type_test) }}">Менеджмент - <br> {{ $quizResult[$i]->result }}</a>--}}
                        <a target="_blank" href="{{ route('answerList', [auth()->id(), 1]) }}">Менеджмент - <br> {{ $quizResult[$i]->result }}</a>
                        {{--                   Менеджмент              --}}
                        <br>
                        <br>
                            @endif

                            @if($quizResult[$i]->type_test == 2)

                        <a  target="_blank" href="{{ route('answerList', [auth()->id(), 2 ] )}}">Тест на определение готовности <br> {{ $quizResult[$i]->result }}</a>
                        {{--                    Тест на определение готовности --}}
                        <br>
                        <br>
                            @endif

                            @if($quizResult[$i]->type_test == 3)
                        <a  target="_blank" href="{{ route('answerList', [auth()->id(), 3]) }}">Тест на определение готовности <br> {{ $quizResult[$i]->result }}</a>
                        {{--                    Тест по иностранному языку--}}
                        <br>
                            @endif

                            @endfor
{{--                              1  Менеджмент--}}
{{--                               2 Тест на определение готовности--}}
                            @else
                               Тесты еще не сданы
                            @endif
                        </td>
                    <td>


                        <form action={{ route('pdf.generate', $value->Iin) }} method="get">
                            @csrf
                            <button class="btn btn-primary" name="sendIIN" value="{{ $value->Iin }}" formtarget="_blank" type="submit">Просмотр</button>
                        </form>
                    </td>

                    <td>{{ $value->created_at }}</td>
                    <td>
                        <form action={{ route('getFiless') }} method="get">
                            @csrf
                            <input type="hidden" name="surname" value="{{ $value->surname }}">
                            <input type="hidden" name="name" value="{{ $value->name }}">
                                <button class="btn btn-primary" name="sendIIN" value="{{ $value->Iin }}" type="submit">Скачать все</button>

                         </form>
                    </td>

                </tr>
            </tbody>
        </table>
        </div>

    @endforeach
@endisset
</div>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"--}}
{{--        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"--}}
{{--        crossorigin="anonymous"></script>--}}



</body>
</html>


<script>

    // let city = document.getElementById('cityVal');



    function switchSelect(e) {
        alert(123);


      // document.getElementById('cityVal').value = e.value;

        // document.getElementById('sendForrmm').submit();
    }

    function btnFormInput() {
        let hiddenOption = document.getElementById('hiddenOption');
        let selection =  document.getElementById('selection');
        hiddenOption.value = selection.selectedIndex;
            let forms = document.getElementById('forms');
        //    Динамическое добавление в url данных c blade
         forms.setAttribute('action', '{{ route('searchParamams', '') }}' + '/' + selection.selectedIndex);

    }




        // function switchCountry(e) {
        // let hiddenInput = document.getElementById('countryVal')
        //     console.log(e.selectedIndex);
        //     switch (e.selectedIndex) {
        //         case 1: {
        //             hiddenInput.value = "Алматы_"+e.selectedIndex;
        //             document.getElementById('sendForrmm').submit();
        //             break;
        //         }
        //         case 2: {
        //             hiddenInput.value = "Нур-Султан_"+e.selectedIndex;
        //             document.getElementById('sendForrmm').submit();
        //             break;
        //         }
        //         case 3: {
        //             hiddenInput.value = "Атырау_"+e.selectedIndex;
        //             document.getElementById('sendForrmm').submit();
        //             break;
        //         }
        //         case 4: {
        //             hiddenInput.value = "Актау_"+e.selectedIndex;
        //             document.getElementById('sendForrmm').submit();
        //             break;
        //         }
        //         case 5: {
        //             hiddenInput.value = "Актобе_"+e.selectedIndex;
        //             document.getElementById('sendForrmm').submit();
        //             break;
        //         }
        //         case 6: {
        //             hiddenInput.value = "Кызылорда_"+e.selectedIndex;
        //             document.getElementById('sendForrmm').submit();
        //             break;
        //         }
        //         case 7: {
        //             hiddenInput.value = "Шымкент_"+e.selectedIndex;
        //             document.getElementById('sendForrmm').submit();
        //             break;
        //         }
        //     }
        // }


        function send(data) {

        // alert(data);
        document.getElementById('setVal').value = data;
        event.preventDefault();
        document.getElementById('formSend').submit();
    }


</script>
