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
        $email = $request->input('email');
        $setEmail = $request->input('mailDomen');
        switch ($setEmail) {
            case 1 : {
                $email = $email . '@mail.ru';
                break;
            }
            case 2 : {
                $email = $email . '@gmail.com';
                break;
            }
            case 3 : {
                $email = $email . '@inbox.ru';
                break;
            }
            case 4 : {
                $email = $email . '@list.ru';
                break;
            }
            case 5 : {
                $email = $email . '@bk.ru';
                break;
            }
            case 6 : {
                $email = $email . '@yandex.ru';
                break;
            }
            case 7 : {
                $email = $email . '@yahoo.com';
                break;
            }
            case 8 : {
                $email = $email . '@hotmail.com';
                break;
            }
            case 9 : {
                $email = $email . '@outlook.com';
                break;
            }
        }
//        dd($city);
        try {
            DB::beginTransaction();
            PersonalData::query()->create($res);



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
            'mobileNumber',
            'mobileNumberTwo',
            'emailTwo'
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