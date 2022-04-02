<?php

use App\Http\Controllers\AdminCrudQuiz\QuizCrud;
use App\Http\Controllers\downloadFilesController;
use App\Http\Controllers\switchStateDropDownQuiz\SwitchStateDropDownController;
use App\Models\Quiz\Answer;
use App\Models\Quiz\Questions;
use App\Models\Quiz\TypeTest;

// Категория - Таблица с данными
Route::get('', ['as' => 'admin.dashboard', function () {

    $profileData =  DB::table('personal_dataMBA')->orderBy('created_at', 'desc')->get();
    $content = view('adminPanel.profileUser')->with('profileData', $profileData);
	return AdminSection::view($content, 'Dashboard');
//}])->middleware('admin');
}]);



// Категория - Quiz
Route::get('quiz', ['as' => 'admin.quiz', function () {




    $questions = Questions::all()->where('type_id', 1);
    $answers = Answer::all();
    $data = [];

        for ($i = 0; $i < count($questions); $i++) {
            $arr = [];

            for ($j = 0; $j < count($answers); $j++) {

                if ($questions[$i]->id == $answers[$j]->question_id) {

                    $arr[] = [
                        'type_test' => $questions[$i]->type_id,
                        'type_question' => $questions[$i]->type_question,
                        'question_id' => $answers[$j]->question_id,
                        'name_answer' => $answers[$j]->name,
                        'true_answer' => $answers[$j]->true_answer
                    ];
                }

            }
            $data[] = [$questions[$i]->name => $arr];

            }

        $dropDown = 1;
        $content = view('quiz.quiz')->with('data', $data)->with('dropDown', $dropDown);
	return AdminSection::view($content, 'quiz');
//}])->middleware('admin');
}]);












// рабочий метод с ключ значением
//for ($j = 0; $j < count($answers); $j++) {
//
//    if ($questions[$i]->id == $answers[$j]->question_id) {
//
//        $arr[] = [
//            'type_test' => $questions[$i]->type_id,
//            'type_question' => $questions[$i]->type_question,
//            'question_id' => $answers[$j]->question_id,
//            'name_answer' => $answers[$j]->name,
//            'true_answer' => $answers[$j]->true_answer
//        ];
//
//
//
//    }
//
//
//}
//$data[] = [$questions[$i]->name => $arr];
//
//
//}

