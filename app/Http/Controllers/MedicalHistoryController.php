<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    public function index()
    {
        if (!auth()->user()->biodata) {
            return to_route('application-profile')->with('warning', 'You must fill your Biodata First');
        }
        return view('medical-history');
    }
}