<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Transaction;
use App\Models\Instructor;
use App\Models\DetailTransaction;

class TransactionController extends Controller
{
    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('transactions.create', compact('course'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'instructor_id' => 'required|exists:instructors,id',
        ]);

        $course = Course::findOrFail($request->course_id);
        $instructor = Instructor::findOrFail($request->instructor_id);

        // Ambil status member dari user
        $member = auth()->user()->member;

        // Jika kolom member kosong (null), maka tidak diberikan diskon
        if ($member === null) {
            $discount = 0;
        } elseif ($member == 'Silver') {
            $discount = 0.05 * $course->price;
        } elseif ($member == 'Gold') {
            $discount = 0.1 * $course->price;
        } elseif ($member == 'Platinum') {
            $discount = 0.15 * $course->price;
        }

        $subtotal = $course->price;
        $total = $subtotal - $discount;

        // Cek jika member tidak null, jika null maka atur menjadi string kosong
        if ($member === null) {
            $member = '';
        }

        // Buat data transaksi
        $transaction = Transaction::create([
            'transCode' => uniqid(),
            'transDate' => now(),
            'custName' => auth()->user()->name,
            'member' => $member,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total' => $total,
        ]);

        // Buat data detail transaksi
        $detailTransaction = DetailTransaction::create([
            'transID' => $transaction->id,
            'courseID' => $course->id,
            'instructorID' => $instructor->id,
            'startDate' => now(),
            'price' => $subtotal,
            'discount' => $discount,
        ]);

        // Redirect user ke laman pembayaran dengan mengirimkan ID transaksi
        return redirect()->route('transactions.payment', ['transactionId' => $transaction->id]);
    }


    public function confirm(Request $request)
    {
        $courseId = $request->input('course_id');
        $instructorId = $request->input('instructor_id');

        $course = Course::findOrFail($courseId);
        $instructor = Instructor::findOrFail($instructorId);

        $user = auth()->user();
        $member = $user->member;

        $subtotal = $course->price;
        $discount = 0;

        if ($member == 'Silver') {
            $discount = 0.05 * $subtotal;
        } elseif ($member == 'Gold') {
            $discount = 0.1 * $subtotal;
        } elseif ($member == 'Platinum') {
            $discount = 0.15 * $subtotal;
        }

        $total = $subtotal - $discount;

        return view('transactions.confirm', compact('course', 'instructor', 'member', 'subtotal', 'discount', 'total'));
    }

    public function payment($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
        return view('transactions.payment', compact('transaction'));
    }

    public function ikutiKursus($courseId)
    {
        $course = Course::find($courseId);

        if (!$course) {
            abort(404, 'Kursus tidak ditemukan');
        }

        return view('transactions.create', compact('course'));
    }
}
