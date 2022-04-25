<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestInputs extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
// rules


        return [

            // Tab 1
//            'surname' => 'required|string',
//            'name' => 'required|string',
//            'patronymic' => 'required|string',
//            'gender' => 'required|string',
//            'familyStatus' => 'required|string',
//            'amountOfChildren' => 'required|string',
//            'citizenship' => 'required|string',
//            'nationality' => 'required|string',
//            'dataOfBirth' => 'required|string',
//            'Iin' => 'required|integer',
//            'typeDocument' => 'required|string',
//            'numberDocument' => 'required|integer',
//            'kemVidanDoc' => 'required|string',
//            'dateMonthYearDoc' => 'required|string',
//            'cityOfResidence' => 'required|string',
//            'homeAdress' => 'required|string',
//            'mobileNumber' => 'required|integer',
//            'email' => 'required|email',

//            Tab 2

//            'positionAtWord' => 'required|string',
//            'nameOfTheCompany' => 'required|string',
//            'legalAdress' => 'required|string',
//            'firstWorkExperience' => 'required|string',
//            'upravlencheskiy_stazh' => 'required|string',
//            'jobType' => 'required|string',
//            'fieldOfActivity' => 'required|string',
//            'availabilityOfBusinessTrips' => 'required|string',

//               Tab 3
//            'startEducation' => 'required|date',
//            'endEducation' => 'required|date',
//            'qualification' => 'required|string',
//            'fullNameUniversity' => 'required|string',
//            'speciality' => 'required|string',
//            'languageEducation' => 'required|string',
//            'checkSecondDegree' => 'required|string',
//            'checkMasterDegree' => 'required|string',
//            'checkLanguageKazakh' => 'required|string',
//            'checkLanguageEnglish' => 'required|string',
//            'checkLanguageFrench' => 'required|string',
//            'checkLanguageGerman' => 'required|string',
//            'checkLanguageChinese' => 'required|string',
//            'checkOtherLanguages' => 'nullable|string',
//            'englishProficiencyCertificates' => 'required|string',
//            'certificateIssueDate' => 'nullable|string',
//            'hobby' => 'required|json', QWE
////
//            'achievements' => 'required|string',
//            'reasonForLearning' => 'required|string',
//
//            'suite' => 'nullable|json', QWE
//
//            'otherSuite' => 'nullable|string',

//            'socialNetwork' => 'nullable|json', QWE

//            'PageInFacebook' => 'nullable|string',
//            'PageInInstagram' => 'nullable|string',
//            'PageInTwitter' => 'nullable|string',

//            'checkBoxAboutMBA' => 'required|string', QWE

//            'otherReason' => 'nullable|string',

//            'starsTheQualityOfEducation' => 'required|string', QWE

//            'starsLargeSelectionOfPrograms' => 'required|string',
//            'starsLocationSchool' => 'required|string',
//            'starsDiscounts' => 'required|string',
//            'starsDurationEducation' => 'required|string',
//            'starsСostOfEducation' => 'required|string',
//            'starsReputationMBA' => 'required|string',
//            'starsPartPayment' => 'required|string',
//            'starsFormOfEducation' => 'required|string',

//            'starsCompositionOfTeachers' => 'required|string', QWE

//            'otherСharacteristics' => 'nullable|string',

//            'checkBoxSourceOfFinancing' => 'required|string', QWE
//            'checkBoxMBAProgram' => 'required|string', QWE


//            FILES
//
            'scanFileDocument' => 'required',
            'scanFileDocument.*.*' => 'mimes:pdf,png,jpg|max:75000',

            'scanFileCertificateFromWork' => 'required',
            'scanFileCertificateFromWork.*.*' => 'mimes:pdf,png,jpg|max:75000',
            'scanCertificate' => 'required',
            'scanCertificate.*.*' => 'mimes:pdf,png,jpg|max:75000',
            'resumeFile' => 'required',
            'resumeFile.*.*' => 'mimes:pdf,doc,docx|max:75000',
            'fileEsse' => 'required',
            'fileEsse.*.*' => 'mimes:doc,docx,pdf|max:75000',
            'copyPassport' => 'required',
            'copyPassport.*.*' => 'mimes:pdf,png,jpg|max:75000',
            'foto3x4' => 'required',
            'foto3x4.*.*' => 'mimes:pdf,png,jpg|max:75000',
            'recomentedLetter' => 'required',
            'recomentedLetter.*.*' => 'mimes:pdf,doc,docx|max:75000',
            'medicalDoc' => 'required',
            'medicalDoc.*.*' => 'mimes:pdf,png,jpg|max:75000',
//
//            'fileScanDiplomWithApplication' => 'required',
//            'fileScanDiplomWithApplication.*' => 'mimes:pdf,png,jpg',
//            'scanFileCertificateFromWork' => 'required',
//            'scanFileCertificateFromWork.*' => 'mimes:pdf,png,jpg',
//            'scanCertificate' => 'required',
//            'scanCertificate.*' => 'mimes:pdf,png,jpg',
//            'resumeFile' => 'required',
//            'resumeFile.*' => 'mimes:pdf,doc,docx',
//            'fileEsse' => 'required',
//            'fileEsse.*' => 'mimes:doc,docx,pdf',
//            'copyPassport' => 'required',
//            'copyPassport.*' => 'mimes:pdf,png,jpg',
//            'foto3x4' => 'required',
//            'foto3x4.*' => 'mimes:pdf,png,jpg',
//            'recomentedLetter' => 'required',
//            'recomentedLetter.*' => 'mimes:pdf,doc,docx',
//            'medicalDoc' => 'required',
//            'medicalDoc.*' => 'mimes:pdf,png,jpg',

//        END FILES

//        Requisites

    //        'requisites' => 'nullable|string',
    //        'bin' => 'nullable|integer',
    //        'reqYurAdress' => 'nullable|string',
    //        'bank' => 'nullable|string',
    //        'reqEmail' => 'nullable|email',
    //        'fioSupervisor' => 'nullable|string',
    //        'reqName' => 'nullable|string',
    //        'rnn' => 'nullable|integer',
    //        'telFax' => 'nullable|numeric',
    //        'iik' => 'nullable|string',
    //        'reqSuite' => 'nullable|string',
    //        'reqPositionHead' => 'nullable|string',

//        END Requisites

        ];
    }

//iliyas1994777

//    public function messages()
//    {
//
//        return [
////           Резюме
//            'resumeFile.required' => 'Заполните обязательные поля',
//            'resumeFile.*.mimes' => 'Загрузите  Резюме в формате pdf,doc,docx',
//////           Копия диплома
//            'fileScanDiplomWithApplication.required' => 'Заполните обязательные поля',
//            'fileScanDiplomWithApplication.*.mimes' => 'Загрузите в формате pdf,png,jpg',
////             Скан удостоверения личности
//            'scanFileDocument.required' => 'Заполните обязательные поля',
//            'scanFileDocument.*.mimes' => 'Загрузите Удостоверение в формате pdf,png,jpg',
//////          Справка с места работы
//            'scanFileCertificateFromWork.required' => 'Заполните обязательные поля',
//            'scanFileCertificateFromWork.*.mimes' => 'Загрузите в формате pdf,png,jpg',
////            //          Скан сертификата
//            'scanCertificate.required' => 'Заполните обязательные поля',
//            'scanCertificate.*.mimes' => 'Загрузите в формате pdf,png,jpg',
////            //          Эссе
//            'fileEsse.required' => 'Заполните обязательные поля',
//            'fileEsse.*.mimes' => 'Загрузите в формате pdf,doc,docx',
////            Копия паспорта
//            'copyPassport.required' => 'Заполните обязательные поля',
//            'copyPassport.*.mimes' => 'Загрузите в формате pdf,png,jpg',
////            Фото 3х4
//            'foto3x4.required' => 'Заполните обязательные поля',
//            'foto3x4.*.mimes' => 'Загрузите в формате pdf,png,jpg',
////            Рекомендательное письмо
//            'recomentedLetter.required' => 'Заполните обязательные поля',
//            'recomentedLetter.*.mimes' => 'Загрузите в формате pdf,doc,docx',
////            Медицинская справка (форма 075У) (.pdf или .jpg, .png)
//            'medicalDoc.required' => 'Заполните обязательные поля',
//            'medicalDoc.*.mimes' => 'Загрузите в формате pdf,png,jpg',
//
//        ];
////
//    }

}
