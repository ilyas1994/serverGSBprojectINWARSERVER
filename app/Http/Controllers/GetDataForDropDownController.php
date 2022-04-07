<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GetDataForDropDownController extends Controller
{

//    Отправка dropDown во вью для отображения в input полях
    private function dataFromDB($data) {

        $data = DB::select("SELECT * FROM $data");
        $arrayData = [];

        for ($i = 0; $i < count($data); $i++) {
            array_unshift($arrayData, $data[$i]->name);
        }

        return  $arrayData;

    }

    public function index() {

        $gender = $this->dataFromDB('drop_down_genders');
        $familyStatus = $this->dataFromDB('drop_down_family_statuses');
        $citizenship = $this->dataFromDB('drop_downсitizenships');
        $nationality = $this->dataFromDB('drop_down_nationalities');
        $typeDocument = $this->dataFromDB('drop_down_type_documents');
        $kemVidanDoc = $this->dataFromDB('drop_down_kem_vidan_docs');
        $jobType = $this->dataFromDB('drop_down_job_types');
        $fieldOfActivity = $this->dataFromDB('drop_down_genders');
        $qualification = $this->dataFromDB('drop_down_qualifications');
        $languageEducation = $this->dataFromDB('drop_down_language_education');
        $checkMasterDegree = $this->dataFromDB('drop_down_check_check_master_degrees');
        $checkSecondDegree = $this->dataFromDB('drop_down_check_second_degrees');
        $englishProficiencyCertificates = $this->dataFromDB('drop_down_english_proficiency_certificates');

        $dataArrayForDropDown = [
            'gender' => $gender,
            'familyStatus' => $familyStatus,
            'citizenship' => $citizenship,
            'nationality' => $nationality,
            'typeDocument' => $typeDocument,
            'kemVidanDoc' => $kemVidanDoc,
            'jobType' => $jobType,
//            'fieldOfActivity' => ['наемным руководителем', 'Собственник', 'Учредитель'],
            'fieldOfActivity' => $fieldOfActivity,
            'qualification' => $qualification,
            'languageEducation' => $languageEducation,
            'checkSecondDegree' => $checkSecondDegree,
            'checkMasterDegree' => $checkMasterDegree,
            'englishProficiencyCertificates' => $englishProficiencyCertificates
        ];

        return view('reactComponents.tabs1')->with('dataArrayForDropDown', $dataArrayForDropDown);
    }



}
