<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {

        $applicants = DB::table('users')
            ->join('bio_data', 'users.id', 'bio_data.user_id')
            ->join('medical_histories', 'medical_histories.user_id', 'bio_data.user_id')
            ->join('payments', 'payments.user_id', 'bio_data.user_id')
            ->where(['payments.status' => '00'])
            ->get();
        return view('admin.dashboard')->with(['applicants' => $applicants]);
    }
}