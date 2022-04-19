<?php

namespace App\Http\Controllers;

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

    /**
     * Show the application dashboard.
     *
     * @return void
     * @throws \Exception
     */



    public function index()
    {


        if (auth()->user()->role == 1) {

            switch (auth()->user()->city) {
                case 'almaty':
                {
                    $profileData = DB::table('personal_datamba')->orderBy('created_at', 'desc')->get();
                    $content = view('adminPanel.profileUser')->with('profileData', $profileData);
                    return \SleepingOwl\Admin\Facades\Admin::view($content);

                }
                case 'General MBA - Казахстанская программа MBA -> обучение программа в г. Нур-Султан':
                {
                    return $this->selectCountry('General MBA - Казахстанская программа MBA -> обучение программа в г. Нур-Султан');

                }

            }


//                  return redirect()->route('admin.dashboard');
        }



        if (auth()->user()->role == 2) {
            $answers = \DB::select("SELECT * FROM true_answer_for_questions");
//            dd($answers);
//            $allquestions = \DB::select("SELECT * FROM questions");
            $typeTest = DB::select("SELECT * FROM type_tests");

            $emailUser = auth()->user()->email;
            $questions = null;

            $getTypeTest = DB::select("SELECT type_test FROM quiz_results WHERE email_user = '" .$emailUser. " ' ");

            if ($getTypeTest == null) {
                $random = random_int(1,2);
                $testRandom = \DB::select("SELECT * FROM questions WHERE type_id = 3 OR type_id IN(1,2) AND variant_otveta = '" .$random. "' ");
                $questions = $testRandom;
//                dump($testRandom);

            } else {

//                dump($typeTest);
            for ($i = 0; $i < count($getTypeTest); $i++) {
//                        dump($getTypeTest);
                    if ($getTypeTest[$i]->type_test != 1) {
                        $random = random_int(1, 2);
                        $testRandom1 = \DB::select("SELECT * FROM questions WHERE type_id = 1 AND variant_otveta = '" . $random . "' ");
                        $questions = $testRandom1;
                    }

                    if ($getTypeTest[$i]->type_test != 3) {
                        $testRandom3 = \DB::select("SELECT * FROM questions WHERE type_id = 3");
                        $questions = $testRandom3;
                    }
            }

            }
            if (count($getTypeTest) == 3 ) {
                $typeTest = [];
            }


            $all = [];




            if ($questions != null) {

                for ($n = 0; $n < count($typeTest); $n++) {
                $arrTypeTest = [];

                for ($i = 0; $i < count($questions); $i++) {
                    $arrQuestion = [];

                    for ($j = 0; $j < count($answers); $j++) {

                        if ($typeTest[$n]->id == $questions[$i]->type_id) {

                            if ($questions[$i]->id == $answers[$j]->question_id) {
//                                dd(123);

                                $arrQuestion[] = $answers[$j]->name;
                                $arrTypeTest[$questions[$i]->name] = $arrQuestion;
                            }
                        }

                    }

                }
                $all[$typeTest[$n]->name] = $arrTypeTest;

                }

                dd($all);
                return view('quiz.quizTest')->with('all', $all);

            } else {
                return view('quiz.quizTest')->with('no_test', 'no_test');
            }
//            dd($all);

//            dd(111);

        }
    }
}
