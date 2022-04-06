<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">

{{--        @isset($dataDropDown)--}}
{{--            <h3>{{ dd($dataDropDown['drop_down_check_check_master_degrees'][0]->checkMasterDegree) }}</h3>--}}

{{--        @endisset--}}



        <div class="col-12">

{{--            @error('resumeFile.*')--}}
{{--            <div class="text-danger">{{ $message }}</div>--}}
{{--            @enderror--}}

            @if($errors->any())


                <div class="alert-danger">
                    <ul>
                        @foreach($errors->all() as $errors)
                            <li>{{ $errors }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
        <col-12>


        <form action="sendData" method="post" enctype="multipart/form-data">
            @csrf
        <ul class="nav nav-pills mb-3 justify-content-center d-flex mt-5" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home
                </button>

            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            {{--                       btn 1--}}


            <div class="tab-pane fade show active col-12" id="pills-home" role="tabpanel"
                 aria-labelledby="pills-home-tab">

                {{--                           start--}}
                <div class="col-12 d-flex justify-content-center">
                    <div class="row">


                        <div class="col-4">
                            <label for="exampleFormControlInput1" class="form-label">Фамилия</label>
                            <input type="text" name="surname" value="Иванов" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="col-4 px-3">
                            <label for="exampleFormControlInput1" class="form-label">ИМЯ</label>
                            <input type="text" name="name" value="Вася" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="col-4">
                            <label for="exampleFormControlInput1" class="form-label">Отчество</label>
                            <input type="text" name="patronymic" value="Васенн" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>

                        <div class="col-4">
                            <label for="exampleFormControlInput1" class="form-label">Пол</label>
                            <input type="text" name="gender" value="Муж" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>

                        <div class="col-4 mt-3">

                    </div>


                    <div class="col-4 px-3 mt-3">
                        <label for="exampleFormControlInput1" class="form-label"> Гражданский статус</label>
                        <input type="text" value="женат" name="familyStatus" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="col-4 mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Кол-во детей</label>
                        <input type="text" value="3" name="amountOfChildren" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>


                    <div class="col-4 mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Гражданство</label>
                        <input type="text" value="РК" name="citizenship" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>

                    <div class="col-4 mt-3 px-3">
                        <label for="exampleFormControlInput1" class="form-label">Национальность</label>
                        <input type="text" value="Казах" name="nationality" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>

                    <div class="col-4 mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Дата рождения</label>
                        <input type="text" value="11-12-2003" name="dataOfBirth" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>

                    <div class="mt-3 col-4">
                        <label for="exampleFormControlInput1" class="form-label">ИИН/ПИНФЛ</label>
                        <input type="text" value="12345678911" name="iin" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>

                    <div class="mt-3 col-4">
                        <label for="exampleFormControlInput1" class="form-label">Документ удостоверяющий личность</label>
                        <input type="text" value="Паспорт" name="typeDocument" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>

                    <div class="mt-3 col-5">
                        <label for="exampleFormControlInput1" class="form-label">№ документа удостоверяющий личность* </label>
                        <input type="text" value="312321312" name="numberDocument" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>

                    <div class="mt-3 col-4">
                        <label for="exampleFormControlInput1" class="form-label">Кем и когда выдан</label>
                        <input type="text" value="МЮ РК" name="kemVidanDoc" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>

                        <div class="mt-3 col-4">
                            <label for="exampleFormControlInput1" class="form-label">дд.мм.гггг</label>
                            <input type="text" value="2022-03-11" name="dateMonthYearDoc" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>

{{--                         DOWNLOAD FILES                                               --}}
                        <div class="mb-3 mt-5 col-12">
                            <label for="formFile" class="form-label">Резюме pdf,doc,docx</label>
{{--                            <input class="form-control" name="resumeFile[]" multiple type="file"  id="formFile">--}}
                            <input class="form-control" name="resumeFile[]" multiple type="file"  id="formFile">
                        </div>

                        <div class="mb-3 mt-5 col-12">
                            <label for="formFile" class="form-label">Мотивационное эссе только на EXECUTIVE MBA pdf,doc,docx</label>
                            <input class="form-control" name="fileEsse[]" multiple type="file" id="formFile">
                        </div>

{{--                      + копия удв  --}}
                        <div class="mb-3 mt-5 col-12">
                            <label for="formFile" class="form-label">Копия удостоверения личности pdf,png,jpg</label>
                            <input class="form-control" name="copyUdv[]" multiple type="file" id="formFile">
                        </div>

{{--                        + копия паспорта  --}}
                        <div class="mb-3 mt-5 col-12">
                            <label for="formFile" class="form-label">- Копия паспорта только на EXECUTIVE MBA null</label>
                            <input class="form-control" name="copyPassport[]" multiple type="file" id="formFile">
                        </div>

{{--                        + фото 3х4  --}}
                        <div class="mb-3 mt-5 col-12">
                            <label for="formFile" class="form-label">Фото 3х4</label>
                            <input class="form-control" name="foto3x4[]" multiple type="file" id="formFile">
                        </div>


                        <div class="mb-3 mt-5 col-12">
                            <label for="formFile" class="form-label">Копия диплома о высшем образовании + приложения к диплому о высшем образовании (pdf,png,jpg)</label>
                            <input class="form-control" name="fileScanDiplomWithApplication[]" multiple type="file" id="formFile">
                        </div>

                        <div class="mb-3 mt-5 col-12">
                            <label for="formFile" class="form-label">Справка с места работы с указанием должности (pdf,png,jpg) </label>
                            <input class="form-control" type="file" multiple  name="scanFileCertificateFromWork[]" id="formFile">
                        </div>

                        <div class="mb-3 mt-5 col-12">
                            <label for="formFile" class="form-label">Рекомендательных письма только на EXECUTIVE MBA null</label>
                            <input class="form-control" type="file" multiple  name="recomentedLetter[]" id="formFile">
                        </div>

                        <div class="mb-3 mt-5 col-12">
                            <label for="formFile" class="form-label">Медицинская справка (форма 075У)</label>
                            <input class="form-control" type="file" multiple  name="medicalDoc[]" id="formFile">
                        </div>
{{--                             END DOWNLOAD FILES               --}}



{{-----------------------------------------------------------------}}

                        <div class="mb-3 mt-5 col-12">
                            <label for="formFile" class="form-label">Прикрепить скан сертификата (.pdf,png,jpg)</label>
                            <input class="form-control" name="scanCertificate[]" multiple  type="file" id="formFile">
                        </div>


                        <div class="mt-5 col-3">
                        <label for="exampleFormControlInput1" class="form-label">Город проживания</label>
                        <input type="text" value="Галактика 17" name="cityOfResidence" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>


                    <div class="mt-5 col-3">
                        <label for="exampleFormControlInput1" class="form-label">Домашний адрес</label>
                        <input type="text" value="Марс 35" name="homeAdress" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>


                    <div class="mt-5 col-3">
                        <label for="exampleFormControlInput1" class="form-label">Мобильный телефон</label>
                        <input type="text" value="87771234567" name="mobileNumber" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="mt-5 col-3">
                        <label for="exampleFormControlInput1" class="form-label">Электронная почта</label>
                        <input type="text" value="iliyas1994777@mail.ru" name="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>

                        <button class="mt-5" type="submit">Отправить</button>

                        {{--                           end--}}

                    <div class="col-12 mt-5">
                        <input class="col-12" type="button" value="Далее" id="page2"
                               onclick="document.getElementById('pills-profile-tab2').click()"></input>
                    </div>
                </div>
            </div>
        </div>
        {{--                       btn 2--}}
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Занимаемая должность * </label>
                <input type="text" value="ШЕФ" name="positionAtWord" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Компания (полное наименование) * </label>
                <input type="text" value="AERO COTS" name="nameOfTheCompany" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Юридический адрес *</label>
                <input type="text" value="юр адресов" name="legalAdress" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>


            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Общий трудовой стаж со дня окончания вуза (первое высшее образование) *</label>
                <input type="text" value="80" class="form-control" name="firstWorkExperience" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Управленческий стаж * </label>
                <input type="text" value="73" class="form-control" name="upravlencheskiy_stazh" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Вы являетесь *</label>
                <input type="text" value="учредитель" name="jobType" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Сфера деятельности *</label>
                <input type="text" value="aero-космос" name="fieldOfActivity" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Наличие командировок * </label>
                <input type="text" value="да" class="form-control" name="availabilityOfBusinessTrips" id="exampleFormControlInput1" placeholder="">
            </div>


            {{-- Профиль--}}

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Начало обучения</label>
                <input type="text" value="02.02.2002" name="startEducation" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Конец обучения *</label>
                <input type="text" value="03.04.2003" name="endEducation" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Академическая степень/квалификация *</label>
                <input type="text" value="доцент" name="qualification" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Полное наименование учебного заведения *</label>
                <input type="text" value="Универ ТуТуТу" name="fullNameUniversity" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Специальность (например, юриспруденция или разработка нефтяных и газовых месторождений) *</label>
                <input type="text" value="космонавтики" name="speciality" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Язык обучения *</label>
                <input type="text" value="ляг унский" name="languageEducation" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Имеется ли второе высшее образование</label>
                <input type="text" value="да" name="checkSecondDegree" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Имеется ли магистерская степень </label>
                <input type="text" value="да" name="checkMasterDegree" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>



            {{--Знание языков--}}

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Казахский</label>
                <input type="text" name="checkLanguageKazakh" value="A1 - Начальный/BRGINNER" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Английский</label>
                <input type="text" name="checkLanguageEnglish" value="A2 - Начальный/Master" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Французский</label>
                <input type="text" name="checkLanguageFrench" value="A1 - Начальный/BRGINNER" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Немецкий</label>
                <input type="text" name="checkLanguageGerman" value="A1 - Начальный/BRGINNER" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Китайский</label>
                <input type="text" name="checkLanguageChinese" value="A1 - Начальный/BRGINNER" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Доп язык</label>
                <input type="text" class="form-control" name="checkOtherLanguages" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Наличие сертификатов на знание Английского языка</label>
                <input type="text" value="да" name="englishProficiencyCertificates" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Дата выдачи сертификата</label>
                <input type="text" value="2022-03-11" name="certificateIssueDate" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>



            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Пожалуйста, поделитесь с нами деятельностью и/или интересами, которые имеют для Вас большое значение. </label>
                <input type="text" value="спорт" name="hobby" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Пожалуйста, перечислите три ваших самых больших достижения *</label>
                <input type="text" value="один два три" name="achievements" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Почему вы решили обучаться на программе MBA? *</label>
                <input type="text" value="все отлично" name="reasonForLearning" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>





            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Какие информационные сайты вы читаете? * </label>

            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Tengri news</label>
                <input type="text" value="tengri news" name="suite" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Другие</label>
                <input type="text" class="form-control" name="otherSuite" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Какими социальными сетями/мессенжерами вы пользуетесь? * </label>

            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Twitter</label>
                <input type="text" value="Twitter" name="socialNetwork" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Ваша страница в Facebook</label>
                <input type="text" value="https::/fc.com/777" name="PageInFacebook" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Ваша страница в Instagram</label>
                <input type="text" value="https::/inst/23" name="PageInInstagram" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Ваша страница в Twitter</label>
                <input type="text" value="https::/titter/321" name="PageInTwitter" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Как Вы узнали о программах МВА Высшей Школы Бизнеса AlmaU * </label>
                <input type="text" value="рекомендации" name="checkBoxAboutMBA" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Причины, по которым Вы выбрали МВА Высшей Школы Бизнеса AlmaU * </label>
                <input type="text" value="положительно" name="checkBoxReasonsForChoosingMBA" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Другие</label>
                <input type="text" value="другие" name="otherReason" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            {{-- Какие характеристики программы МВА для Вас важны (отметьте каждый пункт) * --}}

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Качество образования * </label>
                <input type="text" value="5" name="starsTheQualityOfEducation" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Большой выбор программ * </label>
                <input type="text" value="5" name="starsLargeSelectionOfPrograms" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Месторасположение бизнес-школы * </label>
                <input type="text" value="5" name="starsLocationSchool" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Наличие скидок * </label>
                <input type="text" value="5" name="starsDiscounts" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Продолжительность обучения * </label>
                <input type="text" value="5" name="starsDurationEducation" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Стоимость обучения * </label>
                <input type="text" value="5" name="starsСostOfEducation" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Репутация бизнес-школы /университета * </label>
                <input type="text" value="5" name="starsReputationMBA" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Наличие гибкой системы оплаты * </label>
                <input type="text" value="5" name="starsPartPayment" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Форма обучения * </label>
                <input type="text" value="5" name="starsFormOfEducation" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Состав преподавателей * </label>
                <input type="text" value="5" name="starsCompositionOfTeachers" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Другие</label>
                <input type="text" name="otherСharacteristics" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Источник финансирования Вашего обучения *</label>
                <input type="text" value="родители" name="checkBoxSourceOfFinancing" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label"> Выберите программу МВА * </label>
                <input type="text" name="checkBoxMBAProgram" value="general MBA" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

{{--            Реквизиты            --}}
            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Реквизиты</label>
                <input type="text" name="requisites" value="реквизиты" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">БИН</label>
                <input type="text" name="bin" value="123131" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Юридический адрес</label>
                <input type="text" name="reqYurAdress" value="юр адресс" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Банк</label>
                <input type="text" name="bank" value="банк оф америка" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Электронная почта</label>
                <input type="text" name="reqEmail" value="qwe@qwe" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">ФИО руководителя компании</label>
                <input type="text" name="fioSupervisor" value="Генералов Тьюзик" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Наименование</label>
                <input type="text" name="reqName" value="какое наименование" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">РНН</label>
                <input type="text" name="rnn" value="55443" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Телефон, факс</label>
                <input type="text" name="telFax" value="+77312" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">ИИК</label>
                <input type="text" name="iik" value="иик123" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Сайт</label>
                <input type="text" name="reqSuite" value="сайтик" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="mt-5 col-12">
                <label for="exampleFormControlInput1" class="form-label">Должность руководителя компании:</label>
                <input type="text" name="reqPositionHead" value="садовник" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>


        </div>


    </div>

    <div class="row">
        <div class="col-12" style="width: 300px; height: 300px;">

        </div>
    </div>

        </form>
{{--    end form    --}}

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>

<script>
    function qwe(e) {
        let inpute_values = document.getElementById('inpute_values');
        let q1 = document.getElementById('fff');
        let q2 = document.getElementById('fff2');
        let q3 = document.getElementById('fff3');
        let dropdownMenuButton1 = document.getElementById('dropdownMenuButton1');
        switch (e) {
            case 1:
                dropdownMenuButton1.innerText = q1.innerText;
                inpute_values.setAttribute('value', 'zxc');
                break;
            case 2:
                dropdownMenuButton1.innerText = q2.innerText;
                inpute_values.setAttribute('value', 'zxc');
                break;
            case 3:
                dropdownMenuButton1.innerText = q3.innerText;
                inpute_values.setAttribute('value', 'zxc');
                break;
        }
    }
</script>
