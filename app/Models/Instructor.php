<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $fillable = [
        'instructorName', // Add 'instructorName' to the fillable array
        'age',
        'gender',
        'expYear',
        'expDesc',
    ];

// Instructor.php

public function courses()
{
    return $this->belongsToMany(Course::class, 'qualification_course');
}
public function qualifications()
{
    return $this->belongsToMany(Qualification::class, 'qualification_instructor');
}
public function transactions()
{
    return $this->belongsToMany(Transaction::class, 'detail_transactions', 'instructorID', 'transID')
                ->withPivot(['courseID', 'startDate', 'price', 'discount'])
                ->withTimestamps();
}



}
