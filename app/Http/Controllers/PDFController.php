<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use function MongoDB\BSON\fromJSON;

class PDFController extends Controller
{

    // function to display preview
//    public function preview(Request $request)
//    {
//        $getIIN = $request->input('sendIIN');
////        $data = PersonalData::all()->where('iin', $getIIN);
//        $data = \DB::select("SELECT * FROM personal_datamba WHERE iin={$getIIN}");
//
//
////        dd($getIIN);
//        return view('showInPDF.preview')->with('data', $data);
//    }

    private function getFileFromInputs($iin, $copyUdv) {
        return \DB::select("SELECT $copyUdv FROM personal_datamba WHERE iin={$iin}");
    }

    public function generatePDF($iin)
    {

        $getIIN = $iin;
        $data = \DB::select("SELECT * FROM personal_datamba WHERE iin={$getIIN}")[0];
        $data = [

            'datas' => $data
        ];

        $pdf = PDF::loadView('showInPDF.preview', $data);
        return $pdf->download('almau.pdf');
    }



    public function getUdvFile($iin, $copyUdv) {

//        то что в аргументов приходит с метода getFileFromInputs
//        private function getFileFromInputs($iin, $copyUdv) {
//            return \DB::select("SELECT $copyUdv FROM personal_datamba WHERE iin={$iin}");
//        }
//
        $data = $this->getFileFromInputs($iin, $copyUdv);
        foreach ($data[0] as $valuev)

        $toJsonDecode = json_decode($valuev);

        $image = $toJsonDecode;

        for ($i = 0; $i < count($image); $i++) {
            $image[$i] = str_replace('public/', '', $image[$i]);
        }


        $dataa = [
            'datass' => $image
        ];

        $pdf = PDF::loadView('showInPDF.showImage' ,$dataa);
        return $pdf->download('udv.pdf');
    }

    public function getResumeFile($iin, $typeFile) {
       $data = $this->getFileFromInputs($iin, $typeFile);

        $getData = json_decode($data[0]->$typeFile)[0];
//        dd($getData);

        $strReplace = str_replace('public', 'storage', $getData);


        $path = $strReplace;
        return response()->download($path, basename($path));


    }
}
