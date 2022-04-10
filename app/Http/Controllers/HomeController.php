<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
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


        // по 25 вопросов с двух тестов

        if (auth()->user()->role == 2) {
            $answers = \DB::select("SELECT * FROM answers");
            $allquestions = \DB::select("SELECT * FROM questions");
            $typeTest = DB::select("SELECT * FROM type_tests");

            $questions = "";

            $emailUser = auth()->user()->email;
            $checkUser =  DB::table('quiz_results')->where('email_user', $emailUser)->exists();

            if ($checkUser === false) {
                $random = random_int(1,2);
                $testRandom = \DB::select("SELECT * FROM questions WHERE variant_otveta = '" .$random. "' ");
                $questions = $testRandom;
            }






            $all = [];


//            for ($i = 0; $i < count($questions); $i++) {
//                $data = [];
//                for ($j = 0; $j < count($answers); $j++) {
//                        if ($questions[$i]->id == $answers[$j]->question_id) {
//                            $data[] = $answers[$j]->name;
//                        }
//                }
//               $all[$questions[$i]->name] = $data;
//            }

            for ($n = 0; $n < count($typeTest); $n++) {
                $arrTypeTest = [];

                for ($i = 0; $i < count($questions); $i++) {
                    $arrQuestion = [];
                    for ($j = 0; $j < count($answers); $j++) {
                        if ($typeTest[$n]->id == $questions[$i]->type_id) {

                            if ($questions[$i]->id == $answers[$j]->question_id) {
                               $arrQuestion[] = $answers[$j]->name;
                                $arrTypeTest[$questions[$i]->name] = $arrQuestion;
                            }
                        }

                    }

                }
                $all[$typeTest[$n]->id] = $arrTypeTest;
//                dump($all);

            }

            return view('quiz.quizTest')->with('all', $all);

        }
    }
}
