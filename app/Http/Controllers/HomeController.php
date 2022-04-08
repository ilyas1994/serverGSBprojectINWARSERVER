<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        if(auth()->user()->role == 1) {

            return redirect()->route('admin.dashboard');
        }

        if(auth()->user()->role == 2) {
            $answers = \DB::select("SELECT * FROM answers");
            $questions = \DB::select("SELECT * FROM questions");
//            dd($answers);
            $all = [];
            for ($i = 0; $i < count($questions); $i++) {
                $data = [];
//                    array_unshift($data, $questions[$i]->name);
                for ($j = 0; $j < count($answers); $j++) {
                        if ($questions[$i]->id == $answers[$j]->question_id) {
                            $data[] = $answers[$j]->name;

                        }
                }
               $all[$questions[$i]->name] = $data;
            }


//            dd(123);
            return view('quiz.quizTest')->with('all', $all);

        }
    }
}
