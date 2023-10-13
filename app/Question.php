<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'name','description','relationship','relationship_answer','type_id','active','sort'
    ];

    public function getQuestionType()
    {
        return $this->hasOne(QuestionType::class, 'id', 'type_id');
    }

    public function getQuestionDetail()
    {
        return $this->hasMany(QuestionDetail::class)->orderBy('sort', 'asc');
    }

}
