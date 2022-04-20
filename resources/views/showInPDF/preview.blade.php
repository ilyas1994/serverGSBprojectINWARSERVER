<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <title>PDF info</title>
</head>

<style type="text/css">
    h2{
        text-align: center;
        font-size:22px;
        margin-bottom:50px;
    }
    body{
        background:#f2f2f2;
        /*font-family: DejaVu Sans, sans-serif;*/
        font-family: DejaVu Sans, sans-serif;

    }
    .section{
        margin-top:30px;
        padding:50px;
        background:#fff;
    }
    .pdf-btn{
        margin-top:30px;
    }

    hr.style1{
        border-top: 3px solid #8c8b8b;
    }

    span {
        margin: 0;
        padding-left: 3px;
        font-size: 17px;
        font-weight: bold;
    }
    hr {
        margin: 0;
        color: black;
    }

    /* Чтобы не было проблемы с кодировками типа ??????? на всей странице включаем это и нужно чтобы весь
    текст был span
    */


    /** {*/
    /*    font-family: "DejaVu Sans", sans-serif;*/
    /*}*/



    pHeaderStyle {
        font-weight: bold;

    }


</style>

<body>

<div class="container-fluid">


{{--        @dump($datas)--}}
    {{--    <div class="col-md-8 section offset-md-2">--}}
    <div class="col-md-12 section offset-md-2">

        <div class="panel panel-primary">
            <img src="{{ asset('iconPdf.jpg') }}" alt="">

            <div class="panel-heading text-center mt-5">
                <span class="pHeaderStyle">ВЫСШАЯ ШКОЛА БИЗНЕСА ДЕПАРТАМЕНТ МВА</span>
            </div>

            <div class="panel-heading text-center mt-3">
                <span class="pHeaderStyle">Анкета для регистрации на программу МВА
                    (Master of Business Administration)</span>
            </div>


            {{--            <div class="panel-body mt-5" style="border: 1px solid #000000">--}}


            <div class="panel-body mt-5" style="border: 2px solid #8c8b8b">

                <div class="main-div">
                    @isset($datas)
{{--                     @dd($ym->id)--}}
{{--                    @isset($datas->surname)--}}
                        <span>Фамилия: {{ $datas->surname}}</span>
{{--                    @endisset--}}
                    <hr class="style1">
                    <span>Имя: {{ $datas->name }}</span>
                    <hr class="style1">
                        <span>Отчество: {{ $datas->patronymic }}</span>
                        <hr class="style1">
                    <span>Пол: {{ $datas->gender }}</span>
                    <hr class="style1">
{{--                    <span>Возраст (полных лет): {{ $datas-> }}</span>--}}
{{--                    <hr class="style1">--}}
                    <span>Гражданский статус : {{ $datas->familyStatus }}</span>
                    <hr class="style1">
                    <span>Кол-во детей : {{ $datas->amountOfChildren }}</span>
                    <hr class="style1">
                    <span>Гражданство: {{ $datas->citizenship }}</span>
                    <hr class="style1">
                    <span>Национальность: {{ $datas->nationality }}</span>
                </div>
            </div>


            <div class="panel-body mt-4" style="border: 2px solid #8c8b8b">

                <div class="main-div">
                    <span>Дата рождения: {{ $datas->dataOfBirth }}</span>
                    <hr class="style1">
                    <span>ИИН/ПИНФЛ: {{ $datas->Iin }}</span>
                    <hr class="style1">
                    <span>Документ удостоверяющий личность: {{ $datas->typeDocument }}</span>
                </div>
            </div>

            <div class="panel-body mt-4" style="border: 2px solid #8c8b8b">

                <div class="main-div">
                    <span>№ документа удостоверяющий личность : {{ $datas->numberDocument }}</span>
                    <hr class="style1">
                    <span>Кем и когда выдан : {{ $datas->kemVidanDoc }}</span>
                    <hr class="style1">
                    <span>дд.мм.гггг: {{ $datas->dateMonthYearDoc }}</span>
                    <hr class="style1">
                    <span>email: {{ $datas->email }}</span>
                </div>
            </div>

            <div class="panel-body mt-4" style="border: 2px solid #8c8b8b">

                <div class="main-div">
                    <span style="font-size: 15px !important;">Город проживания: {{ $datas->cityOfResidence }} </span>
                </div>
            </div>

            <div class="panel-body mt-4" style="border: 2px solid #8c8b8b">

                <div class="main-div">
                    <span>Домашний адрес:  {{ $datas->homeAdress }}</span>
                    <hr class="style1">
                    <span>Мобильный телефон: {{ $datas->mobileNumber }}</span>
                    <hr class="style1"> <span>
                        Второй мобильный номер: {{ $datas->mobileNumberTwo }}</span>
                    <hr class="style1">
                    <span>Электронная почта: {{ $datas->email }}</span>
                    <hr class="style1">
                    <span>Занимаемая должность: {{ $datas->positionAtWord }}</span>
                </div>
            </div>

            <div class="panel-body mt-4" style="border: 2px solid #8c8b8b">

                <div class="main-div">
                    <span>Компания (полное наименование): {{ $datas->nameOfTheCompany }}</span>
                    <hr class="style1">
                    <span>Юридический адрес: {{ $datas->legalAdress }}</span>
                    <hr class="style1">
                    <span>Общий трудовой стаж со дня окончания вуза (первое высшее образование): {{ $datas->firstWorkExperience }}</span>
                    <hr class="style1">
                    <span>Управленческий стаж: {{ $datas->upravlencheskiy_stazh }}</span>
                    <hr class="style1">
                    <span>Вы являетесь: {{ $datas->jobType }}</span>
                    <hr class="style1">
                    <span>Сфера деятельности: {{ $datas->fieldOfActivity }}</span>
                    <hr class="style1">
                    <span>Наличие командировок: {{ $datas->availabilityOfBusinessTrips }}</span>
                </div>
            </div>

            <div class="panel-body mt-4" style="border: 2px solid #8c8b8b">

                <div class="main-div">
                    <span>Начало обучения: {{ $datas->startEducation }}</span>
                    <hr class="style1">
                    <span>Конец обучения: {{ $datas->endEducation }}</span>
                    <hr class="style1">
                    <span>Академическая степень/квалификация: {{ $datas->qualification }}</span>
                    <hr class="style1">
                    <span>Полное наименование учебного заведения: {{ $datas->fullNameUniversity }}</span>
                    <hr class="style1">
                    <span>Специальность (например, юриспруденция или разработка нефтяных и газовых месторождений): {{ $datas->speciality }}</span>
                    <hr class="style1">
                    <span>Язык обучения: {{ $datas->languageEducation }}</span>
                    <hr class="style1">
                    <span>Имеется ли второе высшее образование: {{ $datas->checkSecondDegree }}</span>
                </div>
            </div>

            <div class="panel-body mt-4" style="border: 2px solid #8c8b8b">
                <div class="main-div">
                    <span>Имеется ли магистерская степень: {{ $datas->checkMasterDegree }} </span>
                    <hr class="style1">
                    <span>Казахский: {{ $datas->checkLanguageKazakh }}</span>
                    <hr class="style1">
                    <span>Английский: {{ $datas->checkLanguageEnglish }}</span>
                    <hr class="style1">
                    <span>Французский: {{ $datas->checkLanguageFrench }}</span>
                    <hr class="style1">
                    <span>Немецкий: {{ $datas->checkLanguageGerman }}</span>
                    <hr class="style1">
                    <span>Китайский: {{ $datas->checkLanguageChinese }}</span>
                    <hr class="style1">
                    <span>Доп язык:  {{ $datas->checkOtherLanguages }}</span>
                </div>
            </div>

            <div class="panel-body mt-4" style="border: 2px solid #8c8b8b">
                <div class="main-div">
                    <span>Наличие сертификатов на знание Английского языка: {{ $datas->englishProficiencyCertificates }}</span>
                    <hr class="style1">
                    <span>Дата выдачи сертификата: {{ $datas->certificateIssueDate }}</span>
                </div>
            </div>

            <div class="panel-body mt-4" style="border: 2px solid #8c8b8b">
                <div class="main-div">
{{--                    @dd($datas->hobby)--}}
                    @if($datas->hobby != null)
                        <span>Пожалуйста, поделитесь с нами деятельностью и/или интересами, которые имеют для Вас большое значение: {{ $datas->hobby }}</span>
                    @endif

{{--                @if($datas->hobby != null)--}}
{{--                    @php--}}
{{--                        if (json_decode($datas->hobby) !== null) {--}}
{{--                        $get = json_decode($datas->hobby);--}}
{{--                        $sss = "";--}}
{{--                        }--}}
{{--                    @endphp--}}
{{--                    --}}
{{--                    @for($i = 0; $i < count($get ); $i++ )--}}
{{--                    @if($i + 1 == count($get))--}}
{{--                            @push($sss .= $get[$i]. "") @endpush--}}
{{--                        @else--}}
{{--                            @push($sss .= $get[$i]. ", ") @endpush--}}
{{--                        @endif--}}

{{--                    @endfor--}}



{{--                        --}}{{--                    <span>Пожалуйста, поделитесь с нами деятельностью и/или интересами, которые имеют для Вас большое значение: {{ $sss }}</span>--}}
{{--                    @endif--}}
                </div>
            </div>

            <div class="panel-body mt-4" style="border: 2px solid #8c8b8b">
                <div class="main-div">
                    <span>Пожалуйста, перечислите три ваших самых больших достижения: {{ $datas->achievements }}</span>
                    <hr class="style1">
                    <span>Почему вы решили обучаться на программе MBA?: {{ $datas->reasonForLearning }}</span>
                    <hr class="style1">
                    <span>Какие информационные сайты вы читаете?  {{ $datas->suite }}</span>

                </div>
            </div>

            <div class="panel-body mt-4" style="border: 2px solid #8c8b8b">
                <div class="main-div">
                    <span>Другие: {{ $datas->otherSuite }}</span>
                    <hr class="style1">

                    @if($datas->socialNetwork != null)
                        <span>Какими социальными сетями/мессенжерами вы пользуетесь? {{ $datas->socialNetwork }}</span>
                    @endif

{{--                    @php--}}
{{--                        $get = json_decode($datas->socialNetwork);--}}
{{--                        $sss1 = "";--}}
{{--                    @endphp--}}
{{--                    @for($i = 0; $i < count($get ); $i++ )--}}
{{--                        @if($i + 1 == count($get))--}}
{{--                            @push($sss1 .= $get[$i]. "") @endpush--}}
{{--                        @else--}}
{{--                            @push($sss1 .= $get[$i]. ", ") @endpush--}}
{{--                        @endif--}}

{{--                    @endfor--}}
{{--                    <span>Какими социальными сетями/мессенжерами вы пользуетесь? {{  $sss1  }}</span>--}}

                    <hr class="style1">
                    <span>Ваша страница в Facebook: {{ $datas->PageInFacebook }}</span>
                    <hr class="style1">
                    <span>Ваша страница в Instagram: {{ $datas->PageInInstagram }}</span>
                    <hr class="style1">
                    <span>Ваша страница в Twitter: {{ $datas->PageInTwitter }}</span>
                    <hr class="style1">
                    <span>Как Вы узнали о программах МВА Высшей Школы Бизнеса AlmaU: {{ $datas->checkBoxAboutMBA }}</span>
                    <hr class="style1">
                    @php
                        $get = json_decode($datas->checkBoxReasonsForChoosingMBA);
                        $sss2 = "";
                    @endphp
                    @for($i = 0; $i < count($get ); $i++ )
                        @if($i + 1 == count($get))
                            @push($sss2 .= $get[$i]. "") @endpush
                        @else
                            @push($sss2 .= $get[$i]. ", ") @endpush
                        @endif

                    @endfor
                    <span>Причины, по которым Вы выбрали МВА Высшей Школы Бизнеса AlmaU: {{ $sss2 }}</span>
                    <hr class="style1">
                    <span>Другие: {{ $datas->otherReason }}</span>
                    <hr class="style1">
                    <span>Качество образования: {{ $datas->starsTheQualityOfEducation }}</span>
                    <hr class="style1">
                    <span>Большой выбор программ: {{ $datas->starsLargeSelectionOfPrograms }}</span>
                </div>
            </div>

            <div class="panel-body mt-4" style="border: 2px solid #8c8b8b">
                <div class="main-div">
                    <span>Месторасположение бизнес-школы: {{ $datas->starsLocationSchool }}</span>
                    <hr class="style1">
                    <span>Наличие скидок: {{ $datas->starsDiscounts }}</span>
                    <hr class="style1">
                    <span>Продолжительность обучения: {{ $datas->starsDurationEducation }}</span>
                    <hr class="style1">
                    <span>Стоимость обучения: {{ $datas->starsСostOfEducation }}</span>
                    <hr class="style1">
                    <span>Репутация бизнес-школы /университета: {{ $datas->starsReputationMBA }}</span>
                    <hr class="style1">
                    <span>Наличие гибкой системы оплаты: {{ $datas->starsPartPayment }}</span>
                    <hr class="style1">
                    <span>Форма обучения: {{ $datas->starsFormOfEducation }}</span>
                    <hr class="style1">
                    <span>Состав преподавателей: {{ $datas->starsCompositionOfTeachers }}</span>
                    <hr class="style1">
                    <span>Другие: {{ $datas->otherСharacteristics }}</span>
                    <hr class="style1">
                    <span>Источник финансирования Вашего обучения: {{ $datas->checkBoxSourceOfFinancing }}</span>
                    <hr class="style1">
                    <span>Реквизиты: {{ $datas->requisites }}</span>
                    <hr class="style1">
                    <span>БИН: {{ $datas->bin }}</span>
                    <hr class="style1">
                    <span>Юридический адрес: {{ $datas->reqYurAdress }}</span>
                    <hr class="style1">
                    <span>Банк: {{ $datas->bank }}</span>
                    <hr class="style1">
                    <span>Электронная почта: {{ $datas->reqEmail }}</span>
                    <hr class="style1">
                    <span>ФИО руководителя компании: {{ $datas->fioSupervisor }}</span>
                    <hr class="style1">
                    <span>Наименование: {{ $datas->reqName }}</span>
                    <hr class="style1">
                    <span>РНН: {{ $datas->rnn }}</span>
                    <hr class="style1">
                    <span>Телефон, факс: {{ $datas->telFax }}</span>
                    <hr class="style1">
                    <span>ИИК: {{ $datas->iik }}</span>
                    <hr class="style1">
                    <span>Сайт: {{ $datas->reqSuite }}</span>
                    <hr class="style1">
                    <span>Должность руководителя компании: {{ $datas->reqPositionHead }}</span>
                    <hr class="style1">
{{--                     end  --}}
                    <span>Выберите программу МВА {{ $datas->checkBoxMBAProgram }}</span>

{{--


{{--            <div class="text-center pdf-btn">--}}
{{--                @isset($data)--}}
{{--                    <a href="{{ route('pdf.generate', $data[0]->iin) }}" class="btn btn-primary">Generate PDF</a>--}}
{{--                @endisset--}}

{{--            </div>--}}

            @endisset

        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>