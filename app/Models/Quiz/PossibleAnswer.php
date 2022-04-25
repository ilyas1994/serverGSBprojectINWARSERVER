<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PossibleAnswer extends Model
{
    use HasFactory;
    protected $table = "possible_answers";
    protected $guarded = false;
}
