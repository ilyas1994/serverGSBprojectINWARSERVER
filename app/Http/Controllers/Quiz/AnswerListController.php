<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz\PossibleAnswer;
use DB;
use Illuminate\Http\Request;

class AnswerListController extends Controller
{
    public function index($id, $type_test) {

           $data = DB::table('possible_answers')->where('user_id', '=', $id)->where('type_test', '=', $type_test)->get();
           return view('quiz.answerList', compact('data'));
    }
}
