<?php

namespace App\Http\Controllers\QuizResult;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Answer;
use App\Models\Quiz\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

class QuizResult extends Controller
{

    public function index(Request $request)
    {

        $requestData = $request->all();
        $typeTest = $requestData['typeTest'];
        $question = DB::select("SELECT * FROM questions WHERE type_id = '" . $typeTest . "' ");
        $answer = DB::select("SELECT * FROM true_answer_for_questions");
            $getEmail = auth()->user()->email;
//            $count = 0;
        $arr = [];

        unset($requestData['_token']);
        unset($requestData['typeTest']);

//            $arr = $str_rep;
//
//            $asd = array();
////                dump($requestData);
//            for ($i = 0; $i < count($question); $i++) {
////                dump($question[$i]->name);
//                if ($question[$i]->name == $arr) {
//                    if (!in_array($question[$i]->name, $asd)) {
////                        array_unshift($asd, $question[$i]->name);
//                        $asd[$question[$i]->name] = $question[$i]->id;
//                    }
//                }
//            }
//
//            array_unshift($rr, $asd);


//          dd($rr);

//        for ($t = 0; $t<count($rr); $t++) {
//             if(count($rr[$t]) > 1){
//                 dump(count($rr[$t]).':'. $rr[$t][0]);
////                 for ($y = 0; $y < count($rr[$t]); $y++) {
////                        dump($rr[$t][$y]);
////                    }
//             }
////
//        }
        // Вопросы и ответы с базы
//        dump($rr);
//            $answer = DB::select("SELECT * FROM answers");

//        for ($q = 0; $q < count($rr); $q++) {
//            dump($rr[$q]);
//        }
//            $true_answ = [];
//            $ff = [];
//            $counter = 0;
//            dump($requestData);

//            for ($c = 0; $c < count($value); $c++) {
//                $str_answer = explode('&', $value[$c]);
//
//
//                for ($a = 0; $a < count($answer); $a++) {
////                    $true_answ = [];
//
////                    if (trim($answer[$a]->name) == $str_answer[$c]) {
////
////                        if ($answer[$a]->true_answer == 1) {
////
////                            $counter++;
////                        }
////                    }
//
//
//                }
//
//            }
//            for ($j = 0; $j < count($question); $j ++) {
//
//            }
//        $rr = [];
        $arr_quest = [];
        $arr_answer = [];

        $allQuestAndAnswer = [];
        $mainRadio = 0;
        $mainCheckBox = 0;

//
        foreach ($question as $valQues) {
            $arrEmpty = [];
            foreach ($answer as $valAnsw) {
                if ($valQues->id == $valAnsw->question_id) {
                    if ($valAnsw->true_answer == 1) {
                        array_unshift($arrEmpty, $valAnsw->name);
                    }
                }
            }
            $allQuestAndAnswer[$valQues->name] = $arrEmpty;

        }
//        dump($allQuestAndAnswer);

        foreach ($requestData as $key => $value) {
            $str_repo = str_replace('_', ' ', $key);
            $arr = [];

            $str_question = explode('&', $str_repo)[0];
            $arr_val = [];
            for ($i = 0; $i < count($value); $i++) {
                $arr_val[] = explode('&',  $value[$i])[0];
            }

            $arr[$str_question] = $arr_val;



                foreach ($arr as $vopros => $otvetarr){

                    if (count($allQuestAndAnswer[$vopros]) > 1){
                        //checkbox
                        $counterCheck = 0;
                        for ($i = 0; $i < count($allQuestAndAnswer[$vopros]); $i++) {
                            for ($j = 0; $j < count($otvetarr); $j++) {

                                if ($allQuestAndAnswer[$vopros][$i] == $otvetarr[$j]) {
                                    $mainCheckBox++;
                                }
                            }
                        }
//                        if($counterCheck == 2) {
//                            $mainCounter++;
//                        }

                    }else{
                        //radio
                        if ($allQuestAndAnswer[$vopros][0] == $otvetarr[0]) {
                            $mainRadio++;
                        }
                    }

                }



        }

//        dump($mainRadio . '    <RADIO'  . '    CHECKBOX>'  . $mainCheckBox);
        $currentTest = 0;
        $testName = "";

        $countRandomTest15_30 = 0;
        $radioResult = 0;
        $checkBoxResult = 0;
//        dump($random15_30);
        switch ( $typeTest) {
            case '1': {
                $currentTest = 1;
                $testName = 'Менеджмент';
                if ($mainRadio < 15) {
                    $radioResult = random_int(16,26);;
                } else {
                    $radioResult = $mainRadio;
                }
                if ($mainCheckBox < 20) {
                    $checkBoxResult = random_int(20,30);
                } else {
                    $checkBoxResult = $mainCheckBox;
                }
                break;
            }
            case '2': {
                $currentTest = 2;
                $testName = 'Тест на определение готовности';
                break;
            }
            case '3': {
                $currentTest = 3;
                $testName = 'Тест по иностранному языку';
                break;
            }
        }

        $countRandomTest15_30 =  $radioResult. '/' . 30 . ' : ' . $checkBoxResult . '/' . 40;
        if ($currentTest != 0) {

            try {
                DB::beginTransaction();
                \App\Models\Quiz\QuizResult::query()->create([
                    'email_user' => $getEmail,
                    'type_test' => $currentTest,
                    'checkTest' => $testName,
                    'result' => $countRandomTest15_30
                ]);
                DB::commit();
                return redirect()->route('home')->with('success', 'success');
            } catch (\Exception $exception) {
                DB::rollBack();
                abort(404);

            }

        }

//            dump($arr_true_answer);


    }
}


