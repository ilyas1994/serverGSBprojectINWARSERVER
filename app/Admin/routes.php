<?php

use App\Models\Quiz\Answer;


// Категория - Таблица с данными
Route::get('', ['as' => 'admin.dashboard', function () {

    $profileData =  DB::table('personal_dataMBA')->orderBy('created_at', 'desc')->get();
    $content = view('adminPanel.profileUser')->with('profileData', $profileData);
	return AdminSection::view($content, 'Dashboard');
//}])->middleware('admin');
}]);



// Категория - Quiz
Route::get('quiz', ['as' => 'admin.quiz', function () {


    $questions = DB::select("SELECT * from questions where type_id = 1");

//    dd($questions);
    $answers = Answer::all();
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

        $dropDown = 1;
        if ($questions == null) {
            $content = view('quiz.quiz')->with('null', 'null');
        } else {
            $content = view('quiz.quiz')->with('data', $data)->with('dropDown', $dropDown);
        }

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

