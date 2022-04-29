<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use function MongoDB\BSON\fromJSON;

class PDFController extends Controller
{


    private function getFileFromInputs($Iin, $copyUdv)
    {
        return \DB::select("SELECT $copyUdv  FROM personal_datamba WHERE Iin={$Iin}");
    }

    // Отобразить все в PDF с Input полей
    public function generatePDF($iin)
    {

        $getIIN = $iin;
        $data = \DB::select("SELECT * FROM personal_datamba WHERE Iin={$getIIN}")[0];
//                dd(gettype(strval(intval($data->gender)-1)));
//        $q = strval(intval($data->gender)-1);
        $dropDowngender = \DB::select("SELECT name FROM drop_down_genders WHERE id = {$data->gender} ")[0]->name;
        $dropDownfamilyStatus = \DB::select("SELECT name FROM drop_down_family_statuses WHERE id = {$data->familyStatus} ")[0]->name;
        $dropDowncitizenship = \DB::select("SELECT name FROM drop_downсitizenships WHERE id = {$data->citizenship} ")[0]->name;
        $dropDownkemVidanDoc = \DB::select("SELECT name FROM drop_down_kem_vidan_docs WHERE id = {$data->kemVidanDoc} ")[0]->name;
        $dropDownjobType = \DB::select("SELECT name FROM drop_down_job_types WHERE id = {$data->jobType} ")[0]->name;
        $dropDownfieldOfActivity = \DB::select("SELECT name FROM drop_down_field_of_activities WHERE id = {$data->fieldOfActivity} ")[0]->name;
        $dropDownlanguageEducation = \DB::select("SELECT name FROM drop_down_language_education WHERE id = {$data->languageEducation} ")[0]->name;
        $dropDownqualification = \DB::select("SELECT name FROM drop_down_qualifications WHERE id = {$data->qualification} ")[0]->name;
        $dropDowncheckLanguageKazakh = \DB::select("SELECT name FROM drop_down_level_languages WHERE id = {$data->checkLanguageKazakh} ")[0]->name;
        $dropDowncheckLanguageEnglish = \DB::select("SELECT name FROM drop_down_level_languages WHERE id = {$data->checkLanguageEnglish} ")[0]->name;
        $dropDowncheckLanguageFrench = \DB::select("SELECT name FROM drop_down_level_languages WHERE id = {$data->checkLanguageFrench} ")[0]->name;
        $dropDowncheckLanguageGerman = \DB::select("SELECT name FROM drop_down_level_languages WHERE id = {$data->checkLanguageGerman} ")[0]->name;
        $dropDowncheckLanguageChinese = \DB::select("SELECT name FROM drop_down_level_languages WHERE id = {$data->checkLanguageChinese} ")[0]->name;
        $dropDownenglishProficiencyCertificates = \DB::select("SELECT name FROM drop_down_english_proficiency_certificates WHERE id = {$data->englishProficiencyCertificates} ")[0]->name;
        $dropDowndrop_down_nationalities = \DB::select("SELECT name FROM drop_down_nationalities WHERE id = {$data->englishProficiencyCertificates} ")[0]->name;
        $dropDowndropdrop_down_type_documents = \DB::select("SELECT name FROM drop_down_type_documents WHERE id = {$data->englishProficiencyCertificates} ")[0]->name;

        $dropDownArr['dropDowngender'] = $dropDowngender;
        $dropDownArr['dropDownfamilyStatus'] = $dropDownfamilyStatus;
        $dropDownArr['dropDowncitizenship'] = $dropDowncitizenship;
        $dropDownArr['dropDownkemVidanDoc'] = $dropDownkemVidanDoc;
        $dropDownArr['dropDownjobType'] = $dropDownjobType;
        $dropDownArr['dropDownfieldOfActivity'] = $dropDownfieldOfActivity;
        $dropDownArr['dropDownlanguageEducation'] = $dropDownlanguageEducation;
        $dropDownArr['dropDownqualification'] = $dropDownqualification;
        $dropDownArr['dropDowncheckLanguageKazakh'] = $dropDowncheckLanguageKazakh;
        $dropDownArr['dropDowncheckLanguageEnglish'] = $dropDowncheckLanguageEnglish;
        $dropDownArr['dropDowncheckLanguageFrench'] = $dropDowncheckLanguageFrench;
        $dropDownArr['dropDowncheckLanguageGerman'] = $dropDowncheckLanguageGerman;
        $dropDownArr['dropDowncheckLanguageChinese'] = $dropDowncheckLanguageChinese;
        $dropDownArr['dropDownenglishProficiencyCertificates'] = $dropDownenglishProficiencyCertificates;
        $dropDownArr['dropDowndrop_down_nationalities'] = $dropDowndrop_down_nationalities;
        $dropDownArr['drop_down_type_documents'] = $dropDowndropdrop_down_type_documents;


//                dd($dropDownArr);


        $arrData = [];
        $arr = [];

        if ($data->OtherDynamicEducation != null) {

            for ($i = 0; $i < count(json_decode($data->OtherDynamicEducation)); $i++) {
//                dump(json_decode($data->OtherDynamicEducation)[$i] );
                            $arr[] = [
                               'Дата начала обучения'  => json_decode($data->OtherDynamicEducation)[$i][0], // 'Дата начала обучения'
                                'Дата окончания обучения' => json_decode($data->OtherDynamicEducation)[$i][1], //'Дата окончания обучения
                                'Язык обучения' => json_decode($data->OtherDynamicEducation)[$i][2], // язык обучения
                                'Академическая степень/квалификация' => json_decode($data->OtherDynamicEducation)[$i][3], // Академическая степень/квалификация
                                'Полное наименование учебного заведения' => json_decode($data->OtherDynamicEducation)[$i][4], // Полное наименование учебного заведения
                                'Специальность' => json_decode($data->OtherDynamicEducation)[$i][2], // Специальность
                            ];
//                $arr[] = [
//                    'startEduc'  => json_decode($data->OtherDynamicEducation)[$i][0], // 'Дата начала обучения'
//                    'finishData' => json_decode($data->OtherDynamicEducation)[$i][1], //'Дата окончания обучения
//                    'langEduc' => json_decode($data->OtherDynamicEducation)[$i][2], // язык обучения
//                    'academQual' => json_decode($data->OtherDynamicEducation)[$i][3], // Академическая степень/квалификация
//                    'fullName' => json_decode($data->OtherDynamicEducation)[$i][4], // Полное наименование учебного заведения
//                    'speciality' => json_decode($data->OtherDynamicEducation)[$i][2], // Специальность
//                ];


            }

            $arrData[] = $arr;
        }




        $data = [

            'datas' => $data,
            'arr2' => $arrData,
            'dropdown' => $dropDownArr
        ];


//        dump($arrData);

        $pdf = PDF::loadView('showInPDF.preview', $data, $arr);
        return $pdf->download('almau.pdf');
    }


    private function showJPGPNG($datass)
    {
        return view('showInPDF.showImage', compact('datass'));
    }

    public function getResumeFile($iin, $typeFile)
    {

        $data = $this->getFileFromInputs($iin, $typeFile);



        $formatFile = json_decode($data[0]->$typeFile);
        $png = '.png';
        $jpg = '.jpg';
        $pdf = '.pdf';
        $datass = [];
        $check = false;

        if (count($formatFile) > 1) {

            for ($i = 0; $i < count($formatFile); $i++) {

                    $searchPng = stristr($formatFile[$i], $png);
                    $searchJpg = stristr($formatFile[$i], $jpg);
                    $searchPDF = stristr($formatFile[$i], $pdf);
                    if ($searchJpg || $searchPng) {
                        $strRep = str_replace('public/', '', $formatFile[$i]);
                        array_unshift($datass, $strRep);
                    }
                    if ($searchPDF) {
                        $check = true;
                    }
            }
            $arr = $datass;
            if ($check == true) {
                $getData = json_decode($data[0]->$typeFile)[0];
                $strReplace = str_replace('public', 'storage', $getData);
                $path = $strReplace;
                return response()->download($path, basename($path)) ;
            } else {
                return $this->showJPGPNG($arr);
            }

        }
        else {
            $getData = json_decode($data[0]->$typeFile)[0];
        $strReplace = str_replace('public', 'storage', $getData);
        $path = $strReplace;
        return response()->download($path, basename($path));
        }


//        $getData = json_decode($data[0]->$typeFile)[0];
//
//        $strReplace = str_replace('public', 'storage', $getData);
//        $path = $strReplace;
//        return response()->download($path, basename($path));


    }
}
