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
use PharIo\Manifest\Email;
use Str;
use ZipArchive;
use function MongoDB\BSON\fromJSON;
use function MongoDB\BSON\toJSON;


class MainController extends Controller
{

    public function index(Request $request)
    {



//        dd($request->input('positionAtWord'));
//        $qwe = PersonalData::query()->create($r);
//dd($request->input('surname'));
        $fileNames = [];

        $arrayDownloadChech = [
            'scanFileCertificateFromWork',
            'resumeFile',
            'fileScanDiplomWithApplication',
            'scanCertificate',
            'fileEsse',
//            'copyUdv',
            'scanFileDocument',
            'copyPassport',
            'foto3x4',
            'recomentedLetter',
            'medicalDoc',
        ];

        $getUniqIin = $request->input('Iin');



        for ($i = 0; $i < count($arrayDownloadChech); $i++) {

            foreach ($request->file($arrayDownloadChech[$i]) as $key => $file) {
//                dd(123);

                $path = $file->store('public/folder/'.$getUniqIin.'');
                $name = $file->getClientOriginalName();
//                $fileNames[$key]['name'] = $name;
//                $fileNames[$key]['path'] = $path;
                $fileNames[$key] = $path;
//                dd($fileNames[0]['path']);
                switch ($arrayDownloadChech[$i]) {
                    case 'scanFileCertificateFromWork':
                        $scanFileCertificateFromWork = $fileNames;
                        break;
                     case 'resumeFile':
                         $resumeFile = $fileNames;
                        break;
                    case 'fileScanDiplomWithApplication':
                        $fileScanDiplomWithApplication = $fileNames;
                        break;
                    case 'scanCertificate':
                        $scanCertificate = $fileNames;
                        break;
                    case 'fileEsse':
                        $fileEsse = $fileNames;
                        break;
//                        case
//                    'copyUdv':
//                         $copyUdv = $fileNames;
//                        break;
                            case 'scanFileDocument':
                                $scanFileDocument = $fileNames;
                        break;
                    case  'copyPassport':
                         $copyPassport = $fileNames;
                        break;
                    case  'foto3x4':
                         $foto3x4 = $fileNames;
                        break;
                    case  'recomentedLetter':
                         $recomentedLetter = $fileNames;
                        break;
                    case  'medicalDoc':
                         $medicalDoc = $fileNames;
                        break;
                }

            }

        }
        try {
        DB::beginTransaction();


            PersonalData::query()->create([
            'surname' => $request->input('surname'),
            'name' => $request->input('name'),
            'patronymic' => $request->input('patronymic'),
            'gender' => $request->input('gender'),
            'familyStatus' => $request->input('familyStatus'),
            'amountOfChildren' => $request->input('amountOfChildren'),
            'citizenship' => $request->input('citizenship'),
            'nationality' => $request->input('nationality'),
            'dataOfBirth' => $request->input('dataOfBirth'),
            'Iin' => $request->input('Iin'),
                'email' => $request->input('email'),

               'typeDocument' => $request->input('typeDocument'),
               'numberDocument' => $request->input('numberDocument'),
               'kemVidanDoc' => $request->input('kemVidanDoc'),
                'dateMonthYearDoc' => $request->input('dateMonthYearDoc'),
              'cityOfResidence' => $request->input('cityOfResidence'),
               'homeAdress' => $request->input('homeAdress'),
                'mobileNumber' => $request->input('mobileNumber'),
                'positionAtWord' => $request->input('positionAtWord'),

                'nameOfTheCompany' => $request->input('nameOfTheCompany'),
                'legalAdress' => $request->input('legalAdress'),


//            FILES

                'scanFileCertificateFromWork' => json_encode($scanFileCertificateFromWork),
//                Указываем collect
//                'copyUdv' => collect($copyUdv) ,
                'scanFileDocument' => collect($scanFileDocument) ,
                'resumeFile' => json_encode($resumeFile),
                'fileScanDiplomWithApplication' => json_encode($fileScanDiplomWithApplication),
                'scanCertificate' => json_encode($scanCertificate),
                'fileEsse' => json_encode($fileEsse),
                'copyPassport' => json_encode($copyPassport),
                'foto3x4' => json_encode($foto3x4),
                'recomentedLetter' => json_encode($recomentedLetter),
                'medicalDoc' => json_encode($medicalDoc),

//            ENDFiles

                'firstWorkExperience' => $request->input('firstWorkExperience'),
                'upravlencheskiy_stazh' => $request->input('upravlencheskiy_stazh'),
                'jobType' => $request->input('jobType'),
                'fieldOfActivity' => $request->input('fieldOfActivity'),
                'availabilityOfBusinessTrips' => $request->input('availabilityOfBusinessTrips'),
                'startEducation' => $request->input('startEducation'),
                'endEducation' => $request->input('endEducation'),
                'qualification' => $request->input('qualification'),
                'fullNameUniversity' => $request->input('fullNameUniversity'),
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

//               Реквизиты
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

        ]);

            $email = $request->input('email');
            $password = Str::random(5);
            $toHash = Hash::make($password);
            User::query()->create([
                'name' => 'guest',
                'email' => $email,
                'password' => $toHash,
                'role' => 2
            ]);
            \Mail::to($email)->send(new SendPassword($email, $password));
            DB::commit();

            dd('success');

        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
        }


        dd(333);

    }




}
