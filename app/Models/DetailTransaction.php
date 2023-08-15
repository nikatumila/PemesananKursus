<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'transID',
        'courseID',
        'instructorID',
        'startDate',
        'price',
        'discount',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transID');
    }


    public function course()
    {
        return $this->belongsTo(Course::class, 'courseID'); // Ganti Course::class dengan nama model Course 
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructorID'); // Ganti Instructor::class dengan nama model Instructor
    }
}
