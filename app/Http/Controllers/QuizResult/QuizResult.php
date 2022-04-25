<?php

namespace App\Http\Controllers\QuizResult;

use App\Http\Controllers\Controller;
use App\Models\PersonalData;
use App\Models\Quiz\Answer;
use App\Models\Quiz\PossibleAnswer;
use App\Models\Quiz\Questions;
use App\Models\Quiz\TrueAnswerForQuestion;
use App\Models\Quiz\TypeTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use PhpParser\Node\Expr\Array_;
use function Composer\Autoload\includeFile;
use function PHPUnit\Framework\isEmpty;

class QuizResult extends Controller
{

    private $typeTest = "";

    private function addPossibleAnswer()
    {


        $answer = DB::table('true_answer_for_questions')->get();
        $questions = DB::table('questions')->where('type_id', '=', $this->typeTest)->get();

        $arrPosible = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        $possibleAnswerARR = [];
        $counter = 0;
        $finishARR = [];

        for ($i = 0; $i < count($questions); $i++) {
            $arr = [];
            $PosibleCount = 0;
            for ($j = 0; $j < count($answer); $j++) {
                if ($questions[$i]->id == $answer[$j]->question_id) {
                    $arr[$answer[$j]->name] = $arrPosible[$PosibleCount];
                    $PosibleCount++;
                }
            }
            $finishARR[$questions[$i]->name] = $arr;

        }


        return $finishARR;
    }


    private $countQuizz = "";
//    private $checkBox = [];
//    private $radio = [];
    private $requestArr = [];
    private $resultRandom = 0;
    private $numericQuestion = [];

    private $radioResult = 0;
    private $checkBoxResult = 0;

    private function result()
    {

        $resArr = [];


        $possibleAnswer = $this->addPossibleAnswer();


//        if ($this->checkBox != null) {
//            dd($this->checkBox);
//        }




        $pos = [];

        if ($this->requestArr != null) {
            foreach ($this->requestArr as $k => $v){
                $op = [];

                foreach ($possibleAnswer[$k] as $ans => $answer) {
                    foreach ($v as $vop => $pravNeprav){
//                        dump($vop);
                        if(trim($vop) == trim($ans)){

//                            $op[] = [$vop => $answer.':'.$pravNeprav];
                            $op[] = [ $answer => $pravNeprav ];
                        }
                    }

                }
//                $pos[$k]  = $op;

                $pos[] = [$k => $op] ;
            }

        }


        $countCheck = 0;
        $countRadio = 0;
        $radioArr = [];

        for ($i = 0; $i < count($pos); $i++) {

            foreach ($pos[$i] as $key => $val) {
                for ($j = 0; $j < count($val); $j++) {


                    // CheckBox
                    if (count($val) > 1) {
                        foreach ($val[$j] as $valueCheckBox) {
                            if ($valueCheckBox == 'правильно') {
                                $countCheck++;
                            }
                        }
                    } else {
                        // Radio
                        foreach ($val[0] as $keys => $valRadio) {

                            if ($valRadio == 'правильно') {

                                $countRadio++;

                            }


                        }
                    }
                }
            }
        }

        $asd = [];
        $radioC = 0;
        $checkC = 0;
        $t_ =[];

//                    for ($j = 0; $j < count($pos); $j++) {
                              $tCOunt = 0;
                            foreach ($pos as $key => $val) {
//                                dump($val);

                                    foreach ($val as $key2 => $val2) {
                                          if (isset($val2[0])) {
//                                              dump(count($val2));
//                                              dump($val2[0]);
                                          }

                                        if(count($val2) == 1 && $countRadio < $this->radioResult){ // radio
                                            $resRadio = $this->radioResult - $countRadio;

//                                              for ($kk = 0; $kk < $resRadio; $kk++) {
//                                                  dump($val2[0]);
                                                  foreach ($val2[0] as $key3 => $val3) {
//                                                      dump($key3 . ":" . $val3);

                                                      if($radioC < $resRadio){
                                                          if($val3 == 'не правильно'){
//                                                          dump($val2[0][$key3]);
                                                              $val2[0][$key3] = 'правильно';
                                                              $radioC++;
//                                                          break;
                                                          }
                                                      }
                                                  }
//                                                 dump($val2[0]);
//                                                 dump($cc);
                                          }else{
                                            $resRadio = $this->checkBoxResult - $countCheck;

                                            for ($x = 0; $x < count($val2); $x++) {
                                                  foreach ($val2[$x] as $key3 => $val3) {
//                                                      dump($key3 . ":" . $val3);
//
                                                      if ($checkC < $resRadio) {
                                                          if ($val3 == 'не правильно') {
//                                                          dump($val2[0][$key3]);
                                                              $val2[$x][$key3] = 'правильно';
                                                              $checkC++;
//                                                          break;
                                                          }
                                                      }
//                                                      dump('ppp  '.$checkC);

                                                  }

                                              }

                                          }
//





//                                                   foreach ($val2[$i] as $key3 => $val3) {
                                                       // Radio
//                                                       for ($j = 0; $j < $resRadio; $j++) {
//
//                                                   if (count($val2[0]) == 1) {
//
//                                                                   if ($val3 == 'неправильно') {
////                                                                       $pos[$j] = [$key2 => [$key3 => 'правильно']];
////                                                                       dump($val2[$i][$key3]);
////                                                                       $pos[$j]  = $val2[$j][$key3] = $key3;
////                                                                            dump($val2);
////                                                                       $asd[$j] = [ $key3 => 'XXXX'] ;
//                                                                       $pos[$j] = $key2 ;
//
//                                                                   } else {
//                                                                       $pos[$j] = $key2 ;
//                                                                   }
//                                                             }
//                                                   }



//                                                   if (count($val2) > 1) {
//
//                                                   }
//                                               }
//                                            $pos[$key2] = $asd;
                                        $t_[]= [$key2  => $val2];


                                    }

                                        $pos[$key] = $t_[$tCOunt];
                                        $tCOunt++;
                            }








//        dump( $this->checkBoxResult .'    =   Rnd CHECKBOX ' .$countCheck . '  <CHECKBOX ' . ' | ' . ' RADIO>  ' . $countRadio. "    rnd = ".$this->radioResult );
//        dump($resRadio);
//        dump($pos);
            return $pos;
    }


    public function index(Request $request)
    {

        $requestData = $request->all();
//        dump($request->all());


        $this->typeTest = $requestData['typeTest'];

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


        $this->countQuizz = count($requestData);


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

        $all = [];
        $check = [];
        foreach ($requestData as $key => $value) {


            $str = explode("_", $key)[0];


            $str_repo = str_replace('_', ' ', $key);


            $arr = [];

            $str_question = explode('&', $str_repo)[0];
            $arr_val = [];

            for ($i = 0; $i < count($value); $i++) {
                $arr_val[] = explode('&', $value[$i])[0];
            }

            $arr[$str_question] = $arr_val;


            foreach ($arr as $vopros => $otvetarr) {
//
                $this->numericQuestion[] = [$vopros];
//                dump($arr[$vopros]); //все я выбрал
//                dump($allQuestAndAnswer[$vopros]); //только правильные с базы

                if (count($allQuestAndAnswer[$vopros]) > 1) {

                    //checkbox
                    $counterCheck = 0;
                    $t = [];
                    for ($j = 0; $j < count($arr[$vopros]); $j++) {
                        if (in_array($arr[$vopros][$j], $allQuestAndAnswer[$vopros])) {

                            $t[$arr[$vopros][$j]] = 'правильно';
//                            dump($t);
                            $mainCheckBox++;
                        } else {
                            $t[$arr[$vopros][$j]] = 'не правильно';
                        }
                    }
                    $check[$vopros] = $t;

//                       for ($i = 0; $i < count($allQuestAndAnswer[$vopros]); $i++) {


//                            dump ($allQuestAndAnswer[$vopros][$i]);
//                            if ($allQuestAndAnswer[$vopros][$i] == $arr[$vopros][$j]) {
////                                $t[$arr[$vopros]] = ' прав ';
//
//                                         break;
//                            }
//                            else {
//                                dump ($arr[$vopros][$j]);
////                                break;
////                                    dump ('не'.$allQuestAndAnswer[$vopros][$i]);
//                            }
//                        }
//                        dump ($allQuestAndAnswer[$vopros][$i]);
//                        $t[$allQuestAndAnswer[$vopros][$i]] = 'не прав';

//                            if(count($otvetarr) == 1) {

//
//                                    $mainCheckBox++;
//
////                                    $this->checkBox[$vopros] = ['правильно' =>$otvetarr[$j]];
//                                    $check[$otvetarr[$j]] = 'правильные';
////                                     $this->requestArr[$vopros] = ['правильные' => $otvetarr[$j]];
//
//                                }
//                                else {
//
//                                        $check[$otvetarr[$j]] = 'не правильно';
////                                    $check[]  = [$otvetarr[$j] => 'не правильно' ];
////
//
//                                }
//                        }
//                        $this->requestArr[$vopros] = $check;
//                    }

                } else {
                    //radio
                        $t = [];
                        if (in_array( $allQuestAndAnswer[$vopros][0], $arr[$vopros])) {
                            $mainRadio++;
                            $t[$allQuestAndAnswer[$vopros][0]] = 'правильно';
                        }
                        else {
                            $t[$arr[$vopros][0]] = 'не правильно';
                        }
//                        else {
//                            dump($allQuestAndAnswer[$vopros][0]);
//
//                            $t[$allQuestAndAnswer[$vopros][0]] = 'правильно';
//                        }
                     $check[$vopros] = $t;


                }

            }

//            foreach ($check as $kk => $vv){
//                array_push( $this->requestArr, $vv);
//            }
//            $this->requestArr = $check;

        }

        $this->requestArr = $check;

//        dump(  $this->requestArr );
//        dump($mainRadio .':'.$mainCheckBox);
//        dump($this->requestArr);
//        dump($mainRadio . '    <RADIO'  . '    CHECKBOX>'  . $mainCheckBox);
        $currentTest = 0;
        $testName = "";

        $countRandomTest15_30 = 0;
//        $radioResult = 0;
//        $checkBoxResult = 0;
//        dump($mainRadio . '  <Radio' . '  CHECKBoX  ' .  $mainCheckBox);
        $resRadANDCheckBOX = $mainRadio + $mainCheckBox;
//        dump($random15_30);
        switch ($typeTest) {
            case '1':
            {

                $currentTest = 1;

                $testName = 'Менеджмент';
                if ($mainRadio < 15) {
                    $radioResult = random_int(16, 26);
//                    $this->resultRandom = $radioResult;
                    $this->radioResult = $radioResult;
                } else {
                    $radioResult = $mainRadio;
                }
                if ($mainCheckBox < 20) {
                    $checkBoxResult = random_int(20, 30);
//                    $this->resultRandom = $radioResult;
                    $this->checkBoxResult = $checkBoxResult;
                } else {
                    $checkBoxResult = $mainCheckBox;
                }
                break;
            }
            case '2':
            {

                $currentTest = 2;
                $testName = 'Тест на определение готовности';

                if ($mainRadio < 20) {
                    $radioResult = random_int(16, 26);
                    $this->radioResult = $radioResult;

                } else {
                    $radioResult = $mainRadio;
                }
//                if ($mainCheckBox < 20) {
//                    $checkBoxResult = random_int(20, 30);
//                    $this->resultRandom = $radioResult;
//                } else {
//                    $checkBoxResult = $mainCheckBox;
//                }
                break;

            }
            case '3':
            {
                $currentTest = 3;
                $testName = 'Тест по иностранному языку';

                if ($mainRadio <= 15) {
                    $radioResult = random_int(16, 26);;
                    $this->radioResult = $radioResult;
                } else {
                    $radioResult = $mainRadio;
                }
//                if ($mainCheckBox < 20) {
//                    $checkBoxResult = random_int(20, 30);
//                    $this->resultRandom = $radioResult;
//                } else {
//                    $checkBoxResult = $mainCheckBox;
//                }
                break;
            }
        }

        $result = $this->result();
        $countRandomTest15_30 = "";
        if ($this->typeTest == 1) {
            $countRandomTest15_30 = $radioResult . '/' . 30 . ' : ' . $checkBoxResult . '/' . 40;

        } else {
            $countRandomTest15_30 = $radioResult . '/' . 30;
        }

        $idUser = auth()->id();


//        for ($j = 0; $j < count($result[0]); $j++) {
//
        $falseAnswer = [];


////
//                }

//            dump($result);
//            foreach ($i = 0)
        if ($currentTest != 0) {
            try {
                DB::beginTransaction();

                for ($yy = 0; $yy < count($result); $yy++) {
                    $resultChar = "";
                    $resultString = "";
                    foreach ($result[$yy] as $keyToDB => $valueToDB) {
                        if (count($valueToDB) == 1) {
                            foreach ($valueToDB[0] as $char => $val) {

                                $resultChar = $char;
                                $resultString = $val;
                            }
                        } else {
                            for ($j = 0; $j < count($valueToDB); $j++) {
                                foreach ($valueToDB[$j] as $char => $val) {


                                    $resultChar = $resultChar.' | '.$char;
                                    $resultString =$resultString.' | '. $val;
                                }
                            }
                        }
                    }
//                    dump($resultChar);

                        PossibleAnswer::query()->create([
                            'user_id' => $idUser,
                            'possibleAnswer' => $resultChar,
                            'checkAnswer' => $resultString,
                            'countQuiz' => $yy + 1,
                            'type_test' => $this->typeTest
                        ]);
                }
//                dd(888);

//                dd(888);
                \App\Models\Quiz\QuizResult::query()->create([
                    'email_user' => $getEmail,
                    'type_test' => $currentTest,
                    'testName' => $testName,
                    'result' => $countRandomTest15_30
                ]);


                DB::commit();

                return redirect()->route('home')->with('success', 'success');
            } catch (\Exception $exception) {
                DB::rollBack();
//                dd($exception);
                abort(404);

            }

        }

//            dump($arr_true_answer);


    }
}


