<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Instructor;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        $courses = Course::all();
        $instructors = Instructor::all();
        $transactions = Transaction::query();

        if ($request->filled('member')) {
            $transactions->where('member', $request->input('member'));
        }

        if ($request->filled('course_id')) {
            $transactions->whereHas('detailTransactions.course', function ($query) use ($request) {
                $query->where('courseID', $request->input('course_id'));
            });
        }

        if ($request->filled('instructor_id')) {
            $transactions->whereHas('detailTransactions.instructor', function ($query) use ($request) {
                $query->where('instructorID', $request->input('instructor_id'));
            });
        }

        $transactions = $transactions->with(['detailTransactions.course', 'detailTransactions.instructor'])->get();

        $monthlyTransactions = Transaction::selectRaw('DATE_FORMAT(transDate, "%Y-%m") as date, COUNT(*) as transaction_count, SUM(subtotal) as subtotal, SUM(discount) as discount, SUM(total) as total')
        ->groupBy('date')
        ->orderBy('date')
        ->get();

        return view('admin.reports.index', [
            'courses' => $courses,
            'transactions' => $transactions,
            'instructors' => $instructors,
            'monthlyTransactions' => $monthlyTransactions,
        ]);
    }

}
