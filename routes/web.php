<?php

use App\Http\Controllers\AdminCrudQuiz\QuizCrud;
use App\Http\Controllers\downloadFilesController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\QuizResult\QuizResult;
use App\Http\Controllers\ResetPassword\ResetPasswordController;
use App\Http\Controllers\switchStateDropDownQuiz\SwitchStateDropDownController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
       $drop = new \App\Http\Controllers\GetDataForDropDownController();
    $dataArrayForDropDown = $drop->index();

//    return view('reactComponents.tabs1')->with('dataArrayForDropDown', $dataArrayForDropDown);
    return $dataArrayForDropDown;
});
//Route::get('/', function () {
//
//    return view('main');
//});

//Route::get('/qwe', function () {
//
//    return view('welcome');
//});

Route::get('/data', [\App\Http\Controllers\GetDataForDropDownController::class, 'index']);

Route::post('/sendData', [\App\Http\Controllers\MainController::class, 'index'])->name('sendData');


Route::get('/files', [downloadFilesController::class, 'index'])->name('getFiless')->middleware('admin');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/search/', [App\Http\Controllers\SearchController::class, 'index'])->name('search')->middleware('admin');
Route::get('/search/{www}', [App\Http\Controllers\SearchController::class, 'index'])->name('searchParamams')->middleware('admin');

// Convert to PDF
// Обычный просмотр с кнопкой генерировать, непонятно для чего нужно
Route::get('pdf/preview', [PDFController::class, 'preview'])->name('pdf.preview')->middleware('admin');
// Если хотим сразу показать обработанную в PDF
Route::get('pdf/generate{iin}', [PDFController::class, 'generatePDF'])->name('pdf.generate')->middleware('admin');

// Отображение файлов с input полей

// Удв
Route::get('pdf/iin{iin}/udv{copyUdv}', [PDFController::class, 'getUdvFile'])->name('pdf.getUdvFile')->middleware('admin');
// Pdf файлы
Route::get('pdf/iin{iin}/typeFile/{typeFile}', [PDFController::class, 'getResumeFile'])->name('pdf.getTypeFile')->middleware('admin');


Route::get('pdf/sortBy/', [\App\Http\Controllers\SortingController::class, 'index'])->name('sort')->middleware('admin');


// Quiz
Route::get('/quiz', function () {
    return view('quiz.quiz');
})->middleware('auth');


// Reset Password
Route::post('/resetpassword', [ResetPasswordController::class, 'index'])->name('reset_pass');


// Quiz - Send Reuslt
Route::get('/sendResult', [QuizResult::class, 'index'])->name('quiz_res');

// CRUD
Route::resource('/crud', QuizCrud::class )->middleware('admin');

//SwitchStateDropDown in Quiz
Route::get('/dropdown{id}', [SwitchStateDropDownController::class, 'index'])->name('dropdownState')->middleware('admin');




Route::get('/asd', function (){
   return view('testForUser');
});

Route::get('/test', [\App\Http\Controllers\Test\TestController::class, 'index'])->name('test');