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
        $data = [

            'datas' => $data
        ];

        $pdf = PDF::loadView('showInPDF.preview', $data);
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
