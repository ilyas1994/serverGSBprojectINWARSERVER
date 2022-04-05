<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_dataMBA', function (Blueprint $table) {

            /**
             * Part 1 Личные данные
             */

            $table->id()->autoIncrement();
//             Фамилия *
            $table->string('surname');
            //             Имя *
            $table->string('name');
//            Отчество
            $table->string('patronymic');
            //      Пол        *
            $table->string('gender');
            //      Гражданский статус *         *
            $table->string('familyStatus');
            //            Кол-во детей
            $table->string('amountOfChildren');
            //      Гражданство        *
            $table->string('citizenship');
            //       Национальность       *
            $table->string('nationality');
            //      Дата рождения        *
            $table->text('dataOfBirth');
            //      ИИН/ПИНФЛ          *
            $table->bigInteger('iin');
            //      Документ удостоверяющий личность *         *
            $table->string('typeDocument');
            //       № документа удостоверяющий личность*         *
            $table->bigInteger('numberDocument');
            //       Кем и когда выдан *
            $table->string('kemVidanDoc');
            //      дд.мм.гггг        *
            $table->text('dateMonthYearDoc');
            //        Прикрепить скан документа (.pdf)   *



            // DOWNLOAD FILES
            //        Справка с места работы с указанием должности (.pdf)         *
            $table->text('scanFileCertificateFromWork');
            //       Прикрепить мотивационное эссе (.pdf)       *
            $table->text('fileEsse')->nullable();
            //          Прикрепить резюме (.pdf)        *
            $table->text('resumeFile');
            //           Копия диплома о высшем образовании + приложения к диплому о высшем образовании (.pdf)   *
            $table->text('fileScanDiplomWithApplication');

//            NEW
            //           Копия удостоверения личности (.pdf)   *
            $table->json('copyUdv');
//            Копия паспорта только на EXECUTIVE MBA null
            $table->text('copyPassport')->nullable();
            //           Фото 3х4   *
            $table->text('foto3x4');
            //           Рекомендательных письма только на EXECUTIVE MBA null
            $table->text('recomentedLetter')->nullable();
            //          Медицинская справка (форма 075У)
            $table->text('medicalDoc')->nullable();
            //        Прикрепить скан сертификата (.pdf)      *
            $table->text('scanCertificate');



            // END DOWNLOAD FILES

            //      Город проживания         *
            $table->string('cityOfResidence');
            //     Домашний адрес *         *
            $table->string('homeAdress');
            //       Мобильный телефон *         *
            $table->bigInteger('mobileNumber');
            //      Электронная почта *          *
            $table->string('email');

            /**
             * Part 2 Сведения о трудовой деятельности
             */

            //     Занимаемая должность *           *
            $table->string('positionAtWord');
            //      Компания (полное наименование) *          *
            $table->string('nameOfTheCompany');
            //      Юридический адрес *
            $table->text('legalAdress');
            //        Общий трудовой стаж со дня окончания вуза (первое высшее образование) *      *
            $table->string('firstWorkExperience');
            //         Управленческий стаж *       *
            $table->string('upravlencheskiy_stazh');
            //          Вы являетесь *     *
            $table->string('jobType');
            //          Сфера деятельности *    *
            $table->string('fieldOfActivity');
            //           Наличие командировок *     *
            $table->string('availabilityOfBusinessTrips');
            $table->string('availabilityOfBusinessTripsInputYes')->nullable();
            $table->string('availabilityOfBusinessTripsInputDuration')->nullable();





            /**
             * Part 3 Профиль
             */

             //      Начало обучения *        *
            $table->text('startEducation');
            //       Конец обучения *         *
            $table->text('endEducation');
            //       Академическая степень/квалификация *      *
            $table->string('qualification');
            //        Полное наименование учебного заведения *      *
            $table->string('fullNameUniversity');
            //     Специальность (например, юриспруденция или разработка нефтяных и газовых месторождений) *         *
            $table->string('speciality');
            //         Язык обучения *      *
            $table->string('languageEducation');
            //         Имеется ли второе высшее образование      *
            $table->string('checkSecondDegree');
            //          Имеется ли магистерская степень     *
            $table->string('checkMasterDegree');

////            Знание языков
            //       Казахский       *
            $table->string('checkLanguageKazakh');
            //        Английский      *
            $table->string('checkLanguageEnglish');
            //       Французский       *
            $table->string('checkLanguageFrench');
            //       Немецкий       *
            $table->string('checkLanguageGerman');
            //       Китайский       *
            $table->string('checkLanguageChinese');
//            УТОЧНИТЬЬЬЬ
            $table->string('checkOtherLanguages')->nullable();
            //      Наличие сертификатов на знание Английского языка        *        *
            $table->string('englishProficiencyCertificates');
            //      Дата выдачи сертификата
            $table->text('certificateIssueDate');
            //    Пожалуйста, поделитесь с нами деятельностью и/или интересами, которые имеют для Вас большое значение          *
            $table->string('hobby');
            //     Пожалуйста, перечислите три ваших самых больших достижения *         *
            $table->string('achievements');
            //       Почему вы решили обучаться на программе MBA? *       *
            $table->string('reasonForLearning');

            //      Какие информационные сайты вы читаете? *        *
            $table->string('suite');
            //       Другие
            $table->string('otherSuite')->nullable();
            //       Какими социальными сетями/мессенжерами вы пользуетесь? *         *
            $table->string('socialNetwork');
            //Ваша страница в Facebook        *
            $table->string('PageInFacebook');
            //Ваша страница в Instagram          *
            $table->string('PageInInstagram');
            //      Ваша страница в Twitter        *
            $table->string('PageInTwitter');
//            Как вы узнали о программах MBA
            $table->string('checkBoxAboutMBA');
////             Причины, по которым Вы выбрали МВА Высшей Школы Бизнеса AlmaU *
            $table->string('checkBoxReasonsForChoosingMBA');
            //       Другие       *
            $table->text('otherReason')->nullable();

//             Какие характеристики программы МВА для Вас важны (отметьте каждый пункт) *

            //      Качество образования *          *
            $table->integer('starsTheQualityOfEducation');
            //        Большой выбор программ *        *
            $table->integer('starsLargeSelectionOfPrograms');
            //       Месторасположение бизнес-школы *         *
            $table->integer('starsLocationSchool');
            //      Наличие скидок *          *
            $table->integer('starsDiscounts');
            //       Продолжительность обучения *         *
            $table->integer('starsDurationEducation');
            //          Стоимость обучения *      *
            $table->integer('starsСostOfEducation');
            //         Репутация бизнес-школы /университета *       *
            $table->integer('starsReputationMBA');
            //          Наличие гибкой системы оплаты *      *
            $table->integer('starsPartPayment');
            //        Форма обучения *        *
            $table->integer('starsFormOfEducation');
            //         Состав преподавателей *       *
            $table->integer('starsCompositionOfTeachers');
            //       Другое       *
            $table->text('otherСharacteristics')->nullable();
////             Источник финансирования Вашего обучения *
            $table->string('checkBoxSourceOfFinancing');
////             Выберите программу МВА *
            $table->string('checkBoxMBAProgram');


            /**
             * Источник финансирования Вашего обучения *
             */

//            Реквизиты
            $table->string('requisites')->nullable();
//            БИН
            $table->string('bin')->nullable();
//            Юридический
            $table->string('reqYurAdress')->nullable();
//            Банк
            $table->string('bank')->nullable();
//            Электронная почта
            $table->string('reqEmail')->nullable();
//            ФИО руководителя компании
            $table->string('fioSupervisor')->nullable();
//            Наименование
            $table->string('reqName')->nullable();
//            РНН
            $table->string('rnn')->nullable();
//            Телефон, факс
            $table->string('telFax')->nullable();
//            ИИК
            $table->string('iik')->nullable();
//            Сайт
            $table->string('reqSuite')->nullable();
//            Должность руководителя компании
            $table->string('reqPositionHead')->nullable();


            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_dataMBA');
    }
}
