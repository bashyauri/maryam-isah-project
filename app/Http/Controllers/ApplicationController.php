<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('profile');
    }
    public function storeBiodata(Request $request)
    {
        dd($request->all());
    }
}