<?php

namespace App\Http\Controllers;

use App\Http\Controllers\QuizResult\QuizResult;
use App\Models\PersonalData;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use SleepingOwl\Admin\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function selectCountry($country) {
        $profileData = DB::select("SELECT * FROM personal_datamba WHERE checkBoxMBAProgram = '" .$country. "'");
        $content = view('adminPanel.profileUser')->with('profileData', $profileData);
        return \SleepingOwl\Admin\Facades\Admin::view($content);
    }

    private function currentTypeTest($typeTest, $emailUser) {
        return DB::select("SELECT type_test FROM quiz_results WHERE email_user = '" .$emailUser. " ' AND type_test = {$typeTest} ");
    }

    private function getFiles() {
        return DB::select("SELECT 
                                    scanFileCertificateFromWork, 
                                    scanFileDocument,
                                    resumeFile,
                                    fileScanDiplomWithApplication,
                                    scanCertificate,
                                    fileEsse,
                                    copyPassport,
                                    foto3x4,
                                    recomentedLetter,
                                    medicalDoc
                                    FROM personal_datamba");
    }

    /**
     * Show the application dashboard.
     *
     * @return void
     * @throws \Exception
     */



    public function index()
    {
        $getFiles = $this->getFiles();

        if (auth()->user()->role == 1) {

            $quizResult = DB::table('quiz_results')->get();
            if (auth()->user()->city == 'Алматы') {
                $profileData = DB::table('personal_datamba')->orderBy('created_at', 'desc')->get();
//                $test = \App\Models\Quiz\QuizResult::all();


            } else {

                $city = auth()->user()->city;
                $profileData = DB::select("SELECT * FROM personal_datamba WHERE checkBoxMBAProgram  LIKE '%{$city}%'  ");

            }
            if(!$quizResult->isEmpty()) {

                $content = view('adminPanel.profileUser')->with('profileData', $profileData)
                    ->with('quizResult', $quizResult)
                    ->with('getFiles', $getFiles);
            } else $content = view('adminPanel.profileUser')->with('profileData', $profileData) ->with('getFiles', $getFiles);
            return \SleepingOwl\Admin\Facades\Admin::view($content);

        }



        if (auth()->user()->role == 2) {
            $answers = \DB::select("SELECT * FROM true_answer_for_questions");

            $typeTest = DB::select("SELECT * FROM type_tests");
            $emailUser = auth()->user()->email;

            $questions = [];


            $random = random_int(1,2);


            $getTypeTest = DB::select("SELECT type_test FROM quiz_results WHERE email_user = '" .$emailUser. " ' ");

            for ($i = 0; $i < count($getTypeTest); $i++) {


                if ($getTypeTest[$i]->type_test == null) {

                    $testRandom = \DB::select("   SELECT * 
                                                    FROM questions 
                                                    WHERE type_id in(1,3) AND variant_otveta  = '" . $random . "' 
                                                    union
                                                    SELECT * 
                                                    FROM questions 
                                                    WHERE type_id = 2"
                    );
                    array_unshift($questions, $testRandom);


                }

            }

            if($this->currentTypeTest(1, $emailUser) == null) {
                $testRandom1 = \DB::select("SELECT * FROM questions WHERE type_id = 1 AND variant_otveta = '" . $random . "' ");
                        foreach ($testRandom1 as  $val1)
//                            array_unshift($questions, $val1);
                            array_push($questions, $val1);

                    }

                if ($this->currentTypeTest(2, $emailUser) == null) {
                        $testRandom2 = \DB::select("SELECT * FROM questions WHERE type_id = 2");
                        foreach ($testRandom2 as $val2) {
                            array_push($questions, $val2);
                        }
                    }

                if ($this->currentTypeTest(3, $emailUser) == null) {
                    $testRandom3 = \DB::select("SELECT * FROM questions WHERE type_id = 3 AND variant_otveta = '" . $random . "'");


                    foreach ($testRandom3 as $val3) {
                        array_push($questions, $val3);
                    }

                }


            $all = [];

            if ($questions != null) {

                for ($n = 0; $n < count($typeTest); $n++) {
                $arrTypeTest = [];
                for ($i = 0; $i < count($questions); $i++) {
                    $arrQuestion = [];
                    for ($j = 0; $j < count($answers); $j++) {

                        if ($typeTest[$n]->name == $questions[$i]->type_id) {



                            if ($questions[$i]->id == $answers[$j]->question_id) {

                                $arrQuestion[] = $answers[$j]->name;
                                $arrTypeTest[$questions[$i]->name] = $arrQuestion;

                            }
                        }

                    }

                }

                    $all[$typeTest[$n]->name] = $arrTypeTest;

                }
                dump($all);
                return view('quiz.quizTest')->with('all', $all);

            } else {
                return view('quiz.quizTest')->with('no_test', 'no_test');
            }

        }
    }
}
