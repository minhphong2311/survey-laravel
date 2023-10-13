<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'client_id','question_id','question','question_type','answer','answer_other'
    ];
}
