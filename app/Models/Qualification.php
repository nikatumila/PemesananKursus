<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $fillable = ['topicID'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'topicID');
    }



    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'qualification_instructor', 'qualification_id', 'instructor_id');
    }

}
