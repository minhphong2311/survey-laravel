<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id','name','ic_number','ic_front','ic_back','phone','address','timeslot','status'
    ];

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getSurvey() {
        return $this->hasMany(Survey::class);
    }
}
