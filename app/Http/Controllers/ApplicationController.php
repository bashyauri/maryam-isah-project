<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\StoreBiodataRequest;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('profile');
    }
    public function storeBiodata(StoreBiodataRequest $request)
    {
        $data = $request->validated();
        dd($data);
    }
}