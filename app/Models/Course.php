<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['courseName', 'price', 'days', 'isCertificate', 'isActive']; // Tambahkan isActive

    protected $attributes = [
        'isActive' => true,
        'isCertificate' => false // Atur nilai default isActive
    ];

    public static $rules = [
        'courseName' => 'required|string|max:255',
        'price' => 'required|numeric',
        'days' => 'required|integer',
        'isCertificate' => 'required|boolean', // Tambahkan aturan untuk isCertificate
        'isActive' => 'required|boolean', // Tambahkan aturan untuk isActive
    ];

    public function qualifications()
    {
        return $this->hasMany(Qualification::class, 'topicID');
    }



// Course.php

public function getAvailableInstructors()
{
    // Mengambil instruktur yang belum memiliki kualifikasi untuk kursus ini
    return Instructor::whereDoesntHave('qualifications', function ($query) {
        $query->where('course_id', $this->id);
    })->get();
}


}
