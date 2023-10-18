<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $role = auth()->user()->role;
        if ($role === 'admin') {
            $applicants = DB::table('users')
                ->join('bio_data', 'users.id', 'bio_data.user_id')
                ->join('medical_histories', 'medical_histories.user_id', 'bio_data.user_id')
                ->join('payments', 'payments.user_id', 'bio_data.user_id')
                ->get();

            return view('admin.dashboard')->with(['applicants' => $applicants]);
        }
        return view('home');
    }
    public function getUmrahCandidates()
    {
        $role = auth()->user()->role;
        if ($role === 'admin') {
            $applicants = DB::table('users')
                ->join('bio_data', 'users.id', 'bio_data.user_id')
                ->join('medical_histories', 'medical_histories.user_id', 'bio_data.user_id')
                ->join('umrah_payments', 'umrah_payments.user_id', 'bio_data.user_id')
                ->get();

            return view('admin.umrah')->with(['applicants' => $applicants]);
        }
        return view('home');
    }
}