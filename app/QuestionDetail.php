<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionDetail extends Model
{
    protected $hidden = ["created_at","updated_at"];

    protected $fillable = [
        'question_id','name','description','sort','other'
    ];

    public function question(){
        $this->belongsTo(Question::class);
    }
}
