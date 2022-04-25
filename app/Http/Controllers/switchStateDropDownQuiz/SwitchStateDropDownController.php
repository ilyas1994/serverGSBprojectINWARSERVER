<?php

namespace App\Http\Controllers\switchStateDropDownQuiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Answer;
use App\Models\Quiz\Questions;
use DB;
use SleepingOwl\Admin\Admin;


class SwitchStateDropDownController extends Controller
{


    public function index($id)
    {
//        dd($id);
        switch ($id) {
            case 1:
                 $dropDown = 'Менеджмент';
                break;
            case 2:
                 $dropDown = 'Second Test';
                break;
            case 3:
                 $dropDown = 'Third Test';
                break;
        }

        $questions = DB::select("SELECT * from questions where type_id = {$id}");
//        $questions = Questions::all()->where('type_id', '=',    $id);
        $answers = Answer::all();

//        dd($questions);
        $data = [];
        for ($i = 0; $i < count($questions); $i++) {
            $arr = [];

            for ($j = 0; $j < count($answers); $j++) {

                if ($questions[$i]->id == $answers[$j]->question_id) {

                    $arr[] = [
                        'type_test' => $questions[$i]->type_id,
                        'type_question' => $questions[$i]->type_question,
                        'answer_id' => $answers[$j]->id,
                        'question_id' => $answers[$j]->question_id,
                        'name_answer' => $answers[$j]->name,
                        'true_answer' => $answers[$j]->true_answer
                    ];
                }

            }

            $data[] = [$questions[$i]->name => $arr];
        }

//        return redirect()->back()->with('data', $data)->with('dropDown', $dropDown);
        $content = \view('quiz.quiz')->with('data', $data)->with('dropDown', $dropDown);
        return \SleepingOwl\Admin\Facades\Admin::view($content);
    }
}
