<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizResult;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(QuizResult $request) {
        dd($request);
    }
}
