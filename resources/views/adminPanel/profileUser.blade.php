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



<div class="col-sm-12 d-flex mt-2">


    <div class="col-5 d-flex">
        <h3>
            Таблица с данными
        </h3>

    </div>

{{--    <div class="col-2 justify-content-end">--}}

    <div class="col-3 justify-content-end d-flex align-items-center">

            <p class="pt-3 pe-3">Фильтр по</p>

{{--        <select class="col-5 h-75  form-select" aria-label="Default select example">--}}

{{--        <option name="sortByData" selected>Дате</option>--}}
{{--        <option name="sortByName" value="1">Имени</option>--}}
{{--        <option name="sortBySurnamee" onclick="event.preventDefault(); document.getElementById('qwe').submit()" value="4">Фамилии</option>--}}

        @if (Session::has('asd'))
            @php
                $hidoption = Session::get('asd')['hiddenOption'];
                    $profileData = Session::get('asd')['data'];
            @endphp
            {{--        @dd($hidoption)--}}
        @endif

{{--        </select>--}}
        <select id="selection" class="col-5 h-75  form-select" aria-label="Default select example">

{{--            <option  onclick="send('name')" selected>Имени</option>--}}
{{--            <option  onclick="send('surname')">Фамилии</option>--}}
{{--            <option  onclick="send('iin')">ИИН</option>--}}

            @if(isset($hidoption))


            @switch($hidoption)
                @case('0')
                <option selected name="name">Имени</option>
                <option name="surname">Фамилии</option>
                <option name="iin">ИИН</option>
                @break

                @case('1')
                    <option name="name">Имени</option>
                    <option selected name="surname">Фамилии</option>
                    <option name="iin">ИИН</option>
                @break

                @case('2')
                    <option name="name">Имени</option>
                    <option name="surname">Фамилии</option>
                    <option selected name="iin">ИИН</option>
                @break


            @endswitch
            @else
                <option selected name="name">Имени</option>
                <option name="surname">Фамилии</option>
                <option  name="iin">ИИН</option>
            @endif

{{--                <option selected>Имени</option>--}}
{{--                <option>Фамилии</option>--}}
{{--                <option>ИИН</option>--}}

{{--            <option selected>Имени</option>--}}
{{--            <option>Фамилии</option>--}}
{{--            <option>ИИН</option>--}}

        </select>

{{--        <form id="formSend" action="{{ route('search') }}" method="get">--}}
{{--            <input id="setVal" type="hidden" name="sortBy">--}}
{{--            <input id="btn" type="submit"  hidden>--}}
{{--        </form>--}}

    </div>

{{--        @php--}}
{{--            $qwe = 4;--}}
{{--        @endphp--}}
{{--    @push($qwe = 6)--}}
{{--    @endpush--}}
{{--    @dd($qwe)--}}

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
                    <th scope="row">{{ $value->iin }}</th>
                    <td>{{ $value->surname }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->patronymic }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->mobileNumber }}</td>

                    <td>
                        {{--                    Показать  Резюме--}}
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->iin, 'resumeFile']) }}">Резюме</a>
                        <br>
                        {{--                    Показать Удв--}}
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getUdvFile', [$value->iin, 'copyUdv']) }}">Удв. личности</a>
                        {{--                    Показать Мотивационное эссе только на EXECUTIVE MBA--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->iin, 'fileEsse']) }}">Мотивационное эссе</a>
                                                {{--Показать foto3x4--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->iin, 'foto3x4']) }}">Фото 3х4</a>
                        {{--                    Показать Копия диплома о высшем образовании + приложения к диплому о высшем образовании (.pdf) --}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->iin, 'fileScanDiplomWithApplication']) }}">Копия диплома + приложения </a>
                        {{--                    Показать Справка с места работы с указанием должности (.pdf)--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->iin, 'scanFileCertificateFromWork']) }}">Справка с места работы</a>
                        {{--                    Показать Рекомендательных письма только на EXECUTIVE MBA null--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->iin, 'recomentedLetter']) }}">Рекомендательные письма</a>
                        {{--                    Показать Медицинская справка (форма 075У)--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->iin, 'medicalDoc']) }}">Медицинская справка</a>
                        {{--                    Показать Прикрепить скан сертификата (.pdf)--}}
                        <br>
                        <a class="aStyle" target="_blank" href="{{ route('pdf.getTypeFile', [$value->iin, 'scanCertificate']) }}">Скан сертификата</a>
                    </td>


                    <td>{{ ('Тест')}}</td>
                    <td>
                        <form action={{ route('pdf.generate', $value->iin) }} method="get">
                            @csrf
                            <button class="btn btn-primary" name="sendIIN" value="{{ $value->iin }}" formtarget="_blank" type="submit">Просмотр</button>
                        </form>
                    </td>

                    <td>{{ $value->created_at }}</td>
                    <td>
                        <form action={{ route('getFiless') }} method="get">
                            @csrf
                                <button class="btn btn-primary" name="sendIIN" value="{{ $value->iin }}" type="submit">Скачать все</button>
                         </form>
                    </td>

                </tr>
            </tbody>
        </table>
        </div>

    @endforeach
@endisset
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>
</html>


<script>



    function btnFormInput() {
        let hiddenOption = document.getElementById('hiddenOption');
        let selection =  document.getElementById('selection');
        hiddenOption.value = selection.selectedIndex;
            let forms = document.getElementById('forms');
        //    Динамическое добавление в url данных c blade
         forms.setAttribute('action', '{{ route('searchParamams', '') }}' + '/' + selection.selectedIndex);

    }




        function send(data) {

        // alert(data);
        document.getElementById('setVal').value = data;
        event.preventDefault();
        document.getElementById('formSend').submit();
    }


</script>
