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
            'arr2' => $arrData
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
