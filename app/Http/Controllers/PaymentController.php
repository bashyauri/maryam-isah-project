<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        if (!auth()->user()->medicalHistory) {
            return to_route('application-profile')->with('warning', 'You must Upload your Medical Records First');
        }
        return view('payment');
    }
}
