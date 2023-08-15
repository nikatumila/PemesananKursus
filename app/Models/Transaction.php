<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailTransaction;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'transCode',
        'transDate',
        'custName',
        'member',
        'subtotal',
        'discount',
        'total',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'courseID');
    }

public function instructor()
{
    return $this->belongsTo(Instructor::class); // Sesuaikan dengan model Instructor yang Anda miliki
}

public function detailTransactions()
{
    return $this->hasMany(DetailTransaction::class, 'transID');
}
}
