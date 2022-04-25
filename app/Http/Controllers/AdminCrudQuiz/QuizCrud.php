<?php

namespace App\Http\Controllers\AdminCrudQuiz;

use App\Http\Controllers\Controller;
use App\Http\Controllers\switchStateDropDownQuiz\SwitchStateDropDownController;
use App\Models\Quiz\Answer;
use App\Models\Quiz\Questions;
use App\Models\Quiz\TrueAnswerForQuestion;
use DB;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SleepingOwl\Admin\Facades\Admin;
use SleepingOwl\Admin\Form\Element\View;
use function PHPUnit\Framework\isEmpty;

class QuizCrud extends Controller
{


    public function iFcreateOnDB($id)
    {
        $questions = DB::select("SELECT * from questions where type_id = {$id}");
//        $questions = Questions::all()->where('type_id', '=',    $id);
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
        $dropDown = $id;
        $content = \view('quiz.quiz')->with('data', $data)->with('dropDown', $dropDown)->with('success', 'success');
        return Admin::view($content);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */


    public function index()
    {

        // загрузка данный происходит в папке Admin/routes
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        $content = \view('crudQuiz.createQuestion.createQuestion');
        return Admin::view($content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        if (!Questions::where('name', $request->input('answer'))->exists()) {

            try {
                DB::beginTransaction();
                Questions::query()->create(
                    [
                        'name' => trim($request->input('answer')),
                        'type_question' => trim($request->input('type___question')),
                        'type_id' => trim($request->input('type_test')),
                        'variant_otveta' => trim($request->input('variantTest'))
                    ]
                )->exists();
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                dump($exception);
            }

            $storeArr = [];
            $allData = $request->all();
            $counter = trim($request->input('counter'));
            $answer = trim($request->input('answer'));
            $getId = Questions::query()->select('id')->where('name', $answer)->get();

            if ($request->input('type___question') == "radio") {
                $typeAnswer = "radio";
            } else {
                $typeAnswer = "checkbox_";
            }


            for ($i = 0; $i < $counter; $i++) {


//            isset проверяет на существование ключа с таким индексом
//             если все четко то идет запись правильных ответов
//            если checkBox выбран то в request приходит on а если не выбран то ничего не приходит


                if ($typeAnswer == 'checkbox_') {
                    if (isset($allData[$typeAnswer . $i])) {

                        $storeArr[] =
                            [
                                'true_answer' => 1,
                                'name' => trim($allData['input_' . $i]),
                                'question_id' => trim($getId[0]->id)
                            ];
                    } else {
                        //                в ином случае будут записываться ответы которые нерпавильные
//                           var_dump($allData[$typeAnswer . $i]);
                        $storeArr[] = [
                            'true_answer' => 0,
                            'name' => trim($allData['input_' . $i]),
                            'question_id' => trim($getId[0]->id)
                        ];
                    }
                } else {
                    if ($i == $allData[$typeAnswer]) {

                        $storeArr[] =
                            [
                                'true_answer' => 1,
                                'name' => trim($allData['input_' . $allData[$typeAnswer]]),
                                'question_id' => trim($getId[0]->id)
                            ];
                    } else {
                        $storeArr[] =
                            [
                                'true_answer' => 0,
                                'name' => trim($allData['input_' . $i]),
                                'question_id' => trim($getId[0]->id)
                            ];
                    }


                }

            }
//            dd($storeArr);
//        dd(1111);
//        dd($storeArr);
            try {
                DB::beginTransaction();
                for ($j = 0; $j < $counter; $j++) {
                    TrueAnswerForQuestion::query()->create($storeArr[$j]);
                }
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                abort(404);
            }
        }
        $getTypeTest = $request->input('type_test');

        return $this->iFcreateOnDB($getTypeTest, true);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * //     * //     * @param int $id
     * //     * //     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {

        $question = DB::select("SELECT * FROM questions WHERE id= {$id}");
        $answer = DB::select("SELECT * FROM answers WHERE question_id= {$id}");

        $content = \view('crudQuiz.editQuiz')->with('question', $question)->with('answer', $answer);
        return Admin::view($content, 'edit');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {


         $data = $request->all();

//         dump($data);
             $answers = [];
             $questID = [];
        $counter = $data['counter'] + 1;
//            dd($counter);
//        dd($data['true_answer_'.$counter]);
        for ($i = 0; $i < $counter; $i ++) {

            if (isset($data['true_answer_'.$i])) {
                array_unshift($questID, $data['id_'.$i]);
                $answers[] = [
                    'name' => $data['name_answer_'.$i],
                    'question_id' => $request->input('name_id'),
                    'true_answer' => 1,
                    ];
//
            } else {
                array_unshift($questID, $data['id_'.$i]);

                $answers[] = [
                    'name' => $data['name_answer_'.$i],
                    'question_id' => $request->input('name_id'),
                    'true_answer' => 0
                ];
            }
        }
//        Answer::query()->update([ ]);
//        dump($questID);
//        dd(123);
        try {
            DB::beginTransaction();
            Questions::query()->where('id', '=', $id)->update(['name' => $request->input('name')]);
                for ($j = 0; $j < $counter; $j++) {
                    TrueAnswerForQuestion::query()->where('id', $questID[$j]) ->update($answers[$j]);

                }


            DB::commit();

           return redirect()->route('admin.quiz');
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
                TrueAnswerForQuestion::query()->where('question_id', '=', $id)->delete();
                Questions::query()->where('id', '=', $id)->delete();
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
          return $exception;
        }

        return $this->iFcreateOnDB(1);
    }
}
