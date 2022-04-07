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
            $table->string('surname')->nullable();
            //             Имя *
            $table->string('name')->nullable();
//            Отчество
            $table->string('patronymic');
            //      Пол        *
            $table->string('gender')->nullable();
            //      Гражданский статус *         *
            $table->string('familyStatus')->nullable();
            //            Кол-во детей
            $table->string('amountOfChildren')->nullable();
            //      Гражданство        *
            $table->string('citizenship')->nullable();
            //       Национальность       *
            $table->string('nationality')->nullable();
            //      Дата рождения        *
            $table->text('dataOfBirth')->nullable();
            //      ИИН/ПИНФЛ          *
            $table->bigInteger('Iin')->nullable();
            //      Документ удостоверяющий личность *         *
            $table->string('typeDocument')->nullable();
            //       № документа удостоверяющий личность*         *
            $table->bigInteger('numberDocument')->nullable();
            //       Кем и когда выдан *
            $table->string('kemVidanDoc')->nullable();
            //      дд.мм.гггг        *
            $table->text('dateMonthYearDoc')->nullable();
            //        Прикрепить скан документа (.pdf)   *



            // DOWNLOAD FILES
            //        Справка с места работы с указанием должности (.pdf)         *
            $table->text('scanFileCertificateFromWork')->nullable();

            $table->text('scanFileDocument')->nullable();


            //       Прикрепить мотивационное эссе (.pdf)  NULLABLE     *
            $table->text('fileEsse')->nullable();


            //          Прикрепить резюме (.pdf)        *
            $table->text('resumeFile')->nullable();
            //           Копия диплома о высшем образовании + приложения к диплому о высшем образовании (.pdf)   *
            $table->text('fileScanDiplomWithApplication')->nullable();

//            NEW
            //           Копия удостоверения личности (.pdf)   *
//            $table->json('copyUdv')->nullable();;


//            Копия паспорта только на EXECUTIVE MBA null   NULLABLE
            $table->text('copyPassport')->nullable();



            //           Фото 3х4   *
            $table->text('foto3x4')->nullable();



            //           Рекомендательных письма только на EXECUTIVE MBA null NULLABLE
            $table->text('recomentedLetter')->nullable();



            //          Медицинская справка (форма 075У)  NULLABLE
            $table->text('medicalDoc')->nullable();



            //        Прикрепить скан сертификата (.pdf)      *
            $table->text('scanCertificate')->nullable();



            // END DOWNLOAD FILES

            //      Город проживания         *
            $table->string('cityOfResidence')->nullable();;
            //     Домашний адрес *         *
            $table->string('homeAdress')->nullable();;
            //       Мобильный телефон *         *
            $table->bigInteger('mobileNumber')->nullable();;
            //      Электронная почта *          *
            $table->string('email')->nullable();



//            Нурик обновлил  то что вышел
            /**
             * Part 2 Сведения о трудовой деятельности
             */

            //     Занимаемая должность *           *
            $table->string('positionAtWord')->nullable();
            //      Компания (полное наименование) *          *
            $table->string('nameOfTheCompany')->nullable();
            //      Юридический адрес *
            $table->text('legalAdress')->nullable();
            //        Общий трудовой стаж со дня окончания вуза (первое высшее образование) *      *
            $table->string('firstWorkExperience')->nullable();
            //         Управленческий стаж *       *
            $table->string('upravlencheskiy_stazh')->nullable();
            //          Вы являетесь *     *
            $table->string('jobType')->nullable();
            //          Сфера деятельности *    *
            $table->string('fieldOfActivity')->nullable();
            //           Наличие командировок *     *
            $table->string('availabilityOfBusinessTrips')->nullable();
            $table->string('availabilityOfBusinessTripsInputYes')->nullable();
            $table->string('availabilityOfBusinessTripsInputDuration')->nullable();





            /**
             * Part 3 Профиль
             */

             //      Начало обучения *        *
            $table->text('startEducation')->nullable();
            //       Конец обучения *         *
            $table->text('endEducation')->nullable();
            //       Академическая степень/квалификация *      *
            $table->string('qualification')->nullable();
            //        Полное наименование учебного заведения *      *
            $table->string('fullNameUniversity')->nullable();
            //     Специальность (например, юриспруденция или разработка нефтяных и газовых месторождений) *         *
            $table->string('speciality')->nullable();
            //         Язык обучения *      *
            $table->string('languageEducation')->nullable();
            //         Имеется ли второе высшее образование      *
            $table->string('checkSecondDegree')->nullable();
            //          Имеется ли магистерская степень     *
            $table->string('checkMasterDegree')->nullable();

////            Знание языков
            //       Казахский       *
            $table->string('checkLanguageKazakh')->nullable();
            //        Английский      *
            $table->string('checkLanguageEnglish')->nullable();
            //       Французский       *
            $table->string('checkLanguageFrench')->nullable();
            //       Немецкий       *
            $table->string('checkLanguageGerman')->nullable();
            //       Китайский       *
            $table->string('checkLanguageChinese')->nullable();
//            УТОЧНИТЬЬЬЬ
            $table->string('checkOtherLanguages')->nullable();
            //      Наличие сертификатов на знание Английского языка        *        *
            $table->string('englishProficiencyCertificates')->nullable();
            //      Дата выдачи сертификата
            $table->text('certificateIssueDate')->nullable();
            //    Пожалуйста, поделитесь с нами деятельностью и/или интересами, которые имеют для Вас большое значение          *
            $table->string('hobby')->nullable();
            //     Пожалуйста, перечислите три ваших самых больших достижения *         *
            $table->string('achievements')->nullable();
            //       Почему вы решили обучаться на программе MBA? *       *
            $table->string('reasonForLearning')->nullable();

            //      Какие информационные сайты вы читаете? *        *
            $table->string('suite')->nullable();
            //       Другие
            $table->string('otherSuite')->nullable();
            //       Какими социальными сетями/мессенжерами вы пользуетесь? *         *
            $table->string('socialNetwork')->nullable();
            //Ваша страница в Facebook        *
            $table->string('PageInFacebook')->nullable();
            //Ваша страница в Instagram          *
            $table->string('PageInInstagram')->nullable();
            //      Ваша страница в Twitter        *
            $table->string('PageInTwitter')->nullable();
//            Как вы узнали о программах MBA
            $table->string('checkBoxAboutMBA')->nullable();
////             Причины, по которым Вы выбрали МВА Высшей Школы Бизнеса AlmaU *
            $table->string('checkBoxReasonsForChoosingMBA')->nullable();
            //       Другие       *
            $table->text('otherReason')->nullable()->nullable();

//             Какие характеристики программы МВА для Вас важны (отметьте каждый пункт) *

            //      Качество образования *          *
            $table->integer('starsTheQualityOfEducation')->nullable();
            //        Большой выбор программ *        *
            $table->integer('starsLargeSelectionOfPrograms')->nullable();
            //       Месторасположение бизнес-школы *         *
            $table->integer('starsLocationSchool')->nullable();
            //      Наличие скидок *          *
            $table->integer('starsDiscounts')->nullable();
            //       Продолжительность обучения *         *
            $table->integer('starsDurationEducation')->nullable();
            //          Стоимость обучения *      *
            $table->integer('starsСostOfEducation')->nullable();
            //         Репутация бизнес-школы /университета *       *
            $table->integer('starsReputationMBA')->nullable();
            //          Наличие гибкой системы оплаты *      *
            $table->integer('starsPartPayment')->nullable();
            //        Форма обучения *        *
            $table->integer('starsFormOfEducation')->nullable();
            //         Состав преподавателей *       *
            $table->integer('starsCompositionOfTeachers')->nullable();
            //       Другое       *
            $table->text('otherСharacteristics')->nullable();
////             Источник финансирования Вашего обучения *
            $table->string('checkBoxSourceOfFinancing')->nullable();
////             Выберите программу МВА *
            $table->string('checkBoxMBAProgram')->nullable();


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
