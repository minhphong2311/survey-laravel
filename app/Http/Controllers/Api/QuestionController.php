<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;

use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
    public function questions()
    {
        return QuestionResource::collection(Question::where('active', true)->get());
    }
}
