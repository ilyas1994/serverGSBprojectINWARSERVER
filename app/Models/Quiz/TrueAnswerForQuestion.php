<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrueAnswerForQuestion extends Model
{
    use HasFactory;
    protected $table = "true_answer_for_questions";
    protected $guarded = false;
}
