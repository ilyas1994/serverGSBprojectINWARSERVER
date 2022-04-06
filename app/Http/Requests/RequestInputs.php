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

        return [
            'surname' => 'required',
            'name' => 'required',
            'patronymic' => 'required|string',
            'gender' => 'required|string',
            'familyStatus' => 'required|string',
            'amountOfChildren' => 'required|integer',
            'citizenship' => 'required|string',
            'nationality' => 'required|string',
            'dataOfBirth' => 'required|string',
            'iin' => 'required|integer',
            'typeDocument' => 'required|string',
            'numberDocument' => 'required|integer',
            'kemVidanDoc' => 'required|string',
            'dateMonthYearDoc' => 'required|string',
            'cityOfResidence' => 'required|string',
            'homeAdress' => 'required|string',
            'mobileNumber' => 'required|integer',
            'email' => 'required|email',
            'positionAtWord' => 'required|string',
            'nameOfTheCompany' => 'required|string',
            'legalAdress' => 'required|string',
            'firstWorkExperience' => 'required|string',
            'upravlencheskiy_stazh' => 'required|string',
            'jobType' => 'required|string',
            'fieldOfActivity' => 'required|string',
            'availabilityOfBusinessTrips' => 'required|string',
            'startEducation' => 'required|string',
            'endEducation' => 'required|string',
            'qualification' => 'required|string',
            'fullNameUniversity' => 'required|string',
            'speciality' => 'required|string',
            'languageEducation' => 'required|string',
            'checkSecondDegree' => 'required|string',
            'checkMasterDegree' => 'required|string',
            'checkLanguageKazakh' => 'required|string',
            'checkLanguageEnglish' => 'required|string',
            'checkLanguageFrench' => 'required|string',
            'checkLanguageGerman' => 'required|string',
            'checkLanguageChinese' => 'required|string',
            'checkOtherLanguages' => 'nullable|string',
            'englishProficiencyCertificates' => 'required|string',
            'certificateIssueDate' => 'required|string',
            'hobby' => 'required|string',
            'achievements' => 'required|string',
            'reasonForLearning' => 'required|string',
            'suite' => 'required|string',
            'otherSuite' => 'nullable|string',
            'socialNetwork' => 'required|string',
            'PageInFacebook' => 'required|string',
            'PageInInstagram' => 'required|string',
            'PageInTwitter' => 'required|string',
            'checkBoxAboutMBA' => 'required|string',
            'checkBoxReasonsForChoosingMBA' => 'required|string',
            'otherReason' => 'nullable|string',
            'starsTheQualityOfEducation' => 'required|string',
            'starsLargeSelectionOfPrograms' => 'required|string',
            'starsLocationSchool' => 'required|string',
            'starsDiscounts' => 'required|string',
            'starsDurationEducation' => 'required|string',
            'starsСostOfEducation' => 'required|string',
            'starsReputationMBA' => 'required|string',
            'starsPartPayment' => 'required|string',
            'starsFormOfEducation' => 'required|string',
            'starsCompositionOfTeachers' => 'required|string',
            'otherСharacteristics' => 'nullable|string',
            'checkBoxSourceOfFinancing' => 'required|string',
            'checkBoxMBAProgram' => 'required|string',

//            FILES

            'copyUdv' => 'required',
            'copyUdv.*' => 'mimes:pdf,png,jpg|max:15000',
            'fileScanDiplomWithApplication' => 'required',
            'fileScanDiplomWithApplication.*' => 'mimes:pdf,png,jpg|max:15000',
            'scanFileCertificateFromWork' => 'required',
            'scanFileCertificateFromWork.*' => 'mimes:pdf,png,jpg|max:15000',
            'scanCertificate' => 'required',
            'scanCertificate.*' => 'mimes:pdf,png,jpg|max:15000',
            'resumeFile' => 'required',
            'resumeFile.*' => 'mimes:pdf,doc,docx|max:15000',
            'fileEsse' => 'required',
            'fileEsse.*' => 'mimes:doc,docx,pdf|max:15000',

            //            'copyPassport.*' => 'required|mimes:pdf|max:15000',
//            'foto3x4.*' => 'required|mimes:pdf|max:15000',
//            'recomentedLetter.*' => 'required|mimes:pdf|max:15000',
//            'medicalDoc.*' => 'required|mimes:pdf|max:15000',

//        END FILES

//        Requisites

        'requisites' => 'nullable|string',
        'bin' => 'nullable|integer',
        'reqYurAdress' => 'nullable|string',
        'bank' => 'nullable|string',
        'reqEmail' => 'nullable|email',
        'fioSupervisor' => 'nullable|string',
        'reqName' => 'nullable|string',
        'rnn' => 'nullable|integer',
        'telFax' => 'nullable|numeric',
        'iik' => 'nullable|string',
        'reqSuite' => 'nullable|string',
        'reqPositionHead' => 'nullable|string',

//        END Requisites
        ];
    }

    public function messages()
    {

        return [
//           Резюме
            'resumeFile.required' => 'Заполните обязательные поля',
            'resumeFile.*.mimes' => 'Загрузите в формате pdf,doc,docx',
            'resumeFile.*.max' => '1 загрузочный файл не должен превышать 15 мб',
//          Копия Удв
            'copyUdv.required' => 'Заполните обязательные поля',
            'copyUdv.*.mimes' => 'Загрузите в формате pdf,png,jpg',
            'copyUdv.*.max' => '1 Загрузочный файл не должен превышать 15 мб',
//           Копия диплома
            'fileScanDiplomWithApplication.required' => 'Заполните обязательные поля',
            'fileScanDiplomWithApplication.*.mimes' => 'Загрузите в формате pdf,png,jpg',
            'fileScanDiplomWithApplication.*.max' => '1 Загрузочный файл не должен превышать 15 мб',
//          Справка с места работы
            'scanFileCertificateFromWork.required' => 'Заполните обязательные поля',
            'scanFileCertificateFromWork.*.mimes' => 'Загрузите в формате pdf,png,jpg',
            'scanFileCertificateFromWork.*.max' => '1 загрузочный файл не должен превышать 15 мб',
            //          Скан сертификата
            'scanCertificate.required' => 'Заполните обязательные поля',
            'scanCertificate.*.mimes' => 'Загрузите в формате pdf,png,jpg',
            'scanCertificate.*.max' => '1 Загрузочный файл не должен превышать 15 мб',
            //          Эссе
            'fileEsse.required' => 'Заполните обязательные поля',
            'fileEsse.*.mimes' => 'Загрузите в формате pdf,doc,docx',
            'fileEsse.*.max' => '1 Загрузочный файл не должен превышать 15 мб',

        ];

    }

}
