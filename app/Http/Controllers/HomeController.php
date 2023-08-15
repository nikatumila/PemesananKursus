<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        $transactions = Transaction::orderBy('transDate', 'desc')->take(10)->get();
        return view('admin.dashboard');
    }

    public function user()
    {
        $courses = Course::where('isActive', true)->get();

        return view('user.dashboard', compact('courses'));
    }

    public function showTransactionReport()
{
    $transactions = Transaction::all(); // Or fetch transactions based on your requirement
    return view('admin.transaction_report', compact('transactions'));
}




}
