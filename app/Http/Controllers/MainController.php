<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestInputs;
use App\Mail\SendPassword;
use App\Models\PersonalData;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PharIo\Manifest\Email;
use Str;
use ZipArchive;
use function MongoDB\BSON\fromJSON;
use function MongoDB\BSON\toJSON;


class MainController extends Controller
{

    public function index(RequestInputs $request)
    {



        $res = array_merge($this->tab1($request), $this->tab2($request), $this->tab3($request), $this->files($request));

//        dd($request->all());
        $city = $request['checkBoxMBAProgram'];
//        dd($city);
        try {
            DB::beginTransaction();
            PersonalData::query()->create($res);


//        dd($request->input('positionAtWord'));
//        $qwe = PersonalData::query()->create($r);
//dd($request->input('surname'));
//        $fileNames = [];
//
//        $arrayDownloadChech = [
//            'scanFileCertificateFromWork',
//            'resumeFile',
//            'fileScanDiplomWithApplication',
//            'scanCertificate',
//            'fileEsse',
////            'copyUdv',
//            'scanFileDocument',
//            'copyPassport',
//            'foto3x4',
//            'recomentedLetter',
//            'medicalDoc',
//        ];
//
//        $getUniqIin = $request->input('Iin');
//
//
//        for ($i = 0; $i < count($arrayDownloadChech); $i++) {
//
//            foreach ($request->file($arrayDownloadChech[$i]) as $key => $file) {
////                dd(123);
//
//                $path = $file->store('public/folder/' . $getUniqIin . '');
//                $name = $file->getClientOriginalName();
////                $fileNames[$key]['name'] = $name;
////                $fileNames[$key]['path'] = $path;
//                $fileNames[$key] = $path;
////                dd($fileNames[0]['path']);
//                switch ($arrayDownloadChech[$i]) {
//                    case 'scanFileCertificateFromWork':
//                        $scanFileCertificateFromWork = $fileNames;
//                        break;
//                    case 'resumeFile':
//                        $resumeFile = $fileNames;
//                        break;
//                    case 'fileScanDiplomWithApplication':
//                        $fileScanDiplomWithApplication = $fileNames;
//                        break;
//                    case 'scanCertificate':
//                        $scanCertificate = $fileNames;
//                        break;
//                    case 'fileEsse':
//                        $fileEsse = $fileNames;
//                        break;
////                        case
////                    'copyUdv':
////                         $copyUdv = $fileNames;
////                        break;
//                    case 'scanFileDocument':
//                        $scanFileDocument = $fileNames;
//                        break;
//                    case  'copyPassport':
//                        $copyPassport = $fileNames;
//                        break;
//                    case  'foto3x4':
//                        $foto3x4 = $fileNames;
//                        break;
//                    case  'recomentedLetter':
//                        $recomentedLetter = $fileNames;
//                        break;
//                    case  'medicalDoc':
//                        $medicalDoc = $fileNames;
//                        break;
//                }
//
//            }
//
//        }
//        try {
//            DB::beginTransaction();
//
//
//            PersonalData::query()->create([
//            'surname' => $request->input($inputName[0]),
//            'name' => $request->input('name'),
//            'patronymic' => $request->input('patronymic'),
//            'gender' => $request->input('gender'),
//            'familyStatus' => $request->input('familyStatus'),
//            'amountOfChildren' => $request->input('amountOfChildren'),
//            'citizenship' => $request->input('citizenship'),
//            'nationality' => $request->input('nationality'),
//            'dataOfBirth' => $request->input('dataOfBirth'),
//            'Iin' => $request->input('Iin'),
//                'email' => $request->input('email'),
//
//               'typeDocument' => $request->input('typeDocument'),
//               'numberDocument' => $request->input('numberDocument'),
//               'kemVidanDoc' => $request->input('kemVidanDoc'),
//                'dateMonthYearDoc' => $request->input('dateMonthYearDoc'),
//              'cityOfResidence' => $request->input('cityOfResidence'),
//               'homeAdress' => $request->input('homeAdress'),
//                'mobileNumber' => $request->input('mobileNumber'),
//
//                 Tab 2
//                'positionAtWord' => $request->input('positionAtWord'),
//                'nameOfTheCompany' => $request->input('nameOfTheCompany'),
//                'legalAdress' => $request->input('legalAdress'),
//                'firstWorkExperience' => $request->input('firstWorkExperience'),
//                'upravlencheskiy_stazh' => $request->input('upravlencheskiy_stazh'),
//                'jobType' => $request->input('jobType'),
//                'fieldOfActivity' => $request->input('fieldOfActivity'),
//                'availabilityOfBusinessTrips' => $request->input('availabilityOfBusinessTrips'),
//
//            FILES
//
//                'scanFileCertificateFromWork' => json_encode($scanFileCertificateFromWork),
////                Указываем collect
////                'copyUdv' => collect($copyUdv) ,
//                'scanFileDocument' => collect($scanFileDocument),
//                'resumeFile' => json_encode($resumeFile),
//                'fileScanDiplomWithApplication' => json_encode($fileScanDiplomWithApplication),
//                'scanCertificate' => json_encode($scanCertificate),
//                'fileEsse' => json_encode($fileEsse),
//                'copyPassport' => json_encode($copyPassport),
//                'foto3x4' => json_encode($foto3x4),
//                'recomentedLetter' => json_encode($recomentedLetter),
//                'medicalDoc' => json_encode($medicalDoc),
//
//            ENDFiles
//
//
//                 Tab 3
//                'startEducation' => $request->input('startEducation'),
//                'endEducation' => $request->input('endEducation'),
//                'qualification' => $request->input('qualification'),
//                'fullNameUniversity' => $request->input('fullNameUniversity'),
//                'speciality' => $request->input('speciality'),
//                'languageEducation' => $request->input('languageEducation'),
//                'checkSecondDegree' => $request->input('checkSecondDegree'),
//                'checkMasterDegree' => $request->input('checkMasterDegree'),
//                'checkLanguageKazakh' => $request->input('checkLanguageKazakh'),
//                'checkLanguageEnglish' => $request->input('checkLanguageEnglish'),
//                'checkLanguageFrench' => $request->input('checkLanguageFrench'),
//                'checkLanguageGerman' => $request->input('checkLanguageGerman'),
//                'checkLanguageChinese' => $request->input('checkLanguageChinese'),
//                'checkOtherLanguages' => $request->input('checkOtherLanguages'),
//                'englishProficiencyCertificates' => $request->input('englishProficiencyCertificates'),
//                'certificateIssueDate' => $request->input('certificateIssueDate'),
//                'hobby' => $request->input('hobby'),
//                'achievements' => $request->input('achievements'),
//                'reasonForLearning' => $request->input('reasonForLearning'),
//                'suite' => $request->input('suite'),
//                'otherSuite' => $request->input('otherSuite'),
//                'socialNetwork' => $request->input('socialNetwork'),
//                'PageInFacebook' => $request->input('PageInFacebook'),
//                'PageInInstagram' => $request->input('PageInInstagram'),
//                'PageInTwitter' => $request->input('PageInTwitter'),
//                'checkBoxAboutMBA' => $request->input('checkBoxAboutMBA'),
//                'checkBoxReasonsForChoosingMBA' => $request->input('checkBoxReasonsForChoosingMBA'),
//                'otherReason' => $request->input('otherReason'),
//                'starsTheQualityOfEducation' => $request->input('starsTheQualityOfEducation'),
//                'starsLargeSelectionOfPrograms' => $request->input('starsLargeSelectionOfPrograms'),
//                'starsLocationSchool' => $request->input('starsLocationSchool'),
//                'starsDiscounts' => $request->input('starsDiscounts'),
//                'starsDurationEducation' => $request->input('starsDurationEducation'),
//                'starsСostOfEducation' => $request->input('starsСostOfEducation'),
//                'starsReputationMBA' => $request->input('starsReputationMBA'),
//                'starsPartPayment' => $request->input('starsPartPayment'),
//                'starsFormOfEducation' => $request->input('starsFormOfEducation'),
//                'starsCompositionOfTeachers' => $request->input('starsCompositionOfTeachers'),
//                'otherСharacteristics' => $request->input('otherСharacteristics'),
//                'checkBoxSourceOfFinancing' => $request->input('checkBoxSourceOfFinancing'),
//                'checkBoxMBAProgram' => $request->input('checkBoxMBAProgram'),
//
////               Реквизиты
//                'requisites' => $request->input('requisites'),
//                'bin' => $request->input('bin'),
//                'reqYurAdress' => $request->input('reqYurAdress'),
//                'bank' => $request->input('bank'),
//                'reqEmail' => $request->input('reqEmail'),
//                'fioSupervisor' => $request->input('fioSupervisor'),
//                'reqName' => $request->input('reqName'),
//                'rnn' => $request->input('rnn'),
//                'telFax' => $request->input('telFax'),
//                'iik' => $request->input('iik'),
//                'reqSuite' => $request->input('reqSuite'),
//                'reqPositionHead' => $request->input('reqPositionHead'),
//
            $email = $request->input('email');
            $password = Str::random(5);
            $toHash = Hash::make($password);
            User::query()->create([
                'name' => 'guest',
                'email' => $email,
                'password' => $toHash,
                'role' => 2,
                'city' => $city,
            ]);
            \Mail::to($email)->send(new SendPassword($email, $password));
            DB::commit();

            dd('success');

        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
        }



    }

    function files($request) {

            $InputName = [
            'scanFileCertificateFromWork',
            'scanFileDocument',
            'resumeFile',
            'fileScanDiplomWithApplication',
            'scanCertificate',
            'fileEsse',
            'copyPassport',
            'foto3x4',
            'recomentedLetter',
            'medicalDoc',
            ];

        $getUniqIin = $request->input('Iin');

        $arr = [];
        for ($i = 0; $i < count($InputName); $i++) {

            foreach ($request->file($InputName[$i]) as $key => $file) {
//                dd(123);

                $path = $file->store('public/folder/' . $getUniqIin . '');
                $name = $file->getClientOriginalName();
//                $fileNames[$key]['name'] = $name;
//                $fileNames[$key]['path'] = $path;
                $fileNames[$key] = $path;

//                dd($fileNames[0]['path']);
                switch ($InputName[$i]) {
                    case 'scanFileCertificateFromWork':
                        $arr['scanFileCertificateFromWork'] = json_encode($fileNames);
//                        $scanFileCertificateFromWork = $fileNames;
                        break;
                    case 'resumeFile':
//                        $resumeFile = $fileNames;
                        $arr['resumeFile'] = json_encode($fileNames);

                        break;
                    case 'fileScanDiplomWithApplication':
//                        $fileScanDiplomWithApplication = $fileNames;
                        $arr['fileScanDiplomWithApplication'] = json_encode($fileNames);

                        break;
                    case 'scanCertificate':
//                        $scanCertificate = $fileNames;
                        $arr['scanCertificate'] = json_encode($fileNames);

                        break;
                    case 'fileEsse':
                        $fileEsse = $fileNames;
                        $arr['fileEsse'] = json_encode($fileNames);

                        break;
                    case 'scanFileDocument':
//                        $scanFileDocument = $fileNames;
                        $arr['scanFileDocument'] = json_encode($fileNames);

                        break;
                    case  'copyPassport':
//                        $copyPassport = $fileNames;
                        $arr['copyPassport'] = json_encode($fileNames);

                        break;
                    case  'foto3x4':
//                        $foto3x4 = $fileNames;
                        $arr['foto3x4'] = json_encode($fileNames);

                        break;
                    case  'recomentedLetter':
                        $arr['recomentedLetter'] = json_encode($fileNames);

//                        $recomentedLetter = $fileNames;
                        break;
                    case  'medicalDoc':
                        $arr['medicalDoc'] = json_encode($fileNames);

//                        $medicalDoc = $fileNames;
                        break;
                }

            }

        }


       return $arr;

    }

    function tab1($request)
    {

        $InputName = [
            'name',
            'surname',
            'patronymic',
            'gender',
            'familyStatus',
            'amountOfChildren',
            'citizenship',
            'nationality',
            'dataOfBirth',
            'Iin',
            'email',
            'typeDocument',
            'numberDocument',
            'kemVidanDoc',
            'dateMonthYearDoc',
            'cityOfResidence',
            'homeAdress',
            'mobileNumber'
        ];



        return $this->getKeyValue($InputName, $request);
    }

    function tab2($request)
    {

        $InputName = [
            'positionAtWord',
            'nameOfTheCompany',
            'legalAdress',
            'firstWorkExperience',
            'upravlencheskiy_stazh',
            'jobType',
            'fieldOfActivity',
            'availabilityOfBusinessTrips'
        ];

       return  $this->getKeyValue($InputName, $request);
    }

    function tab3($request)
    {

        $InputName = [
            'startEducation',
            'endEducation',
            'qualification',
            'qualification',
            'fullNameUniversity',
            'speciality',
            'languageEducation',
            'checkSecondDegree',
            'checkMasterDegree',
            'checkLanguageKazakh',
            'checkLanguageEnglish',
            'checkLanguageFrench',
            'checkLanguageGerman',
            'checkLanguageChinese',
            'checkOtherLanguages',
            'englishProficiencyCertificates',
            'certificateIssueDate',
            'hobby',
            'achievements',
            'reasonForLearning',
            'suite',
            'otherSuite',
            'socialNetwork',
            'PageInFacebook',
            'PageInInstagram',
            'PageInTwitter',
            'checkBoxAboutMBA',
            'checkBoxReasonsForChoosingMBA',
            'otherReason',
            'starsTheQualityOfEducation',
            'starsLargeSelectionOfPrograms',
            'starsLocationSchool',
            'starsDiscounts',
            'starsDurationEducation',
            'starsСostOfEducation',
            'starsReputationMBA',
            'starsPartPayment',
            'starsFormOfEducation',
            'starsCompositionOfTeachers',
            'otherСharacteristics',
            'checkBoxSourceOfFinancing',
            'checkBoxMBAProgram',
            'requisites',
            'bin',
            'reqYurAdress',
            'bank',
            'reqEmail',
            'fioSupervisor',
            'reqName',
            'rnn',
            'telFax',
            'iik',
            'reqSuite',
            'reqPositionHead'
        ];
         return $this->getKeyValue($InputName, $request);

    }

    private function getKeyValue(array $InputName, $request)
    {
        $arr = [];
        for ($i = 0; $i < count($InputName); $i++){

                switch ($InputName[$i]){
                    case 'checkBoxReasonsForChoosingMBA':
                    case 'suite':
                    case 'socialNetwork':
                    case 'hobby':{
//                        dd($InputName);
                        $arr[$InputName[$i]] = json_encode($request->input($InputName[$i]));
                        break;
                    }


                    default:{
                        $arr[$InputName[$i]] = $request->input($InputName[$i]);
                    }
                }

        }

        return $arr;
    }


    /**
     * @param array $InputName
     * @param $request
     * @return array
     */
//    public function getKeyValue(array $InputName, $request): array
//    {
//        $KeyValue[$InputName[0]] = $request->input($InputName[0]);
//        $KeyValue[$InputName[1]] = $request->input($InputName[1]);
//        $KeyValue[$InputName[2]] = $request->input($InputName[2]);
//        $KeyValue[$InputName[3]] = $request->input($InputName[3]);
//        $KeyValue[$InputName[4]] = $request->input($InputName[4]);
//        $KeyValue[$InputName[5]] = $request->input($InputName[5]);
//        $KeyValue[$InputName[6]] = $request->input($InputName[6]);
//        $KeyValue[$InputName[7]] = $request->input($InputName[7]);
//        $KeyValue[$InputName[8]] = $request->input($InputName[8]);
//        return $KeyValue;
//    }
}