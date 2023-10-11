<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\StoreBiodataRequest;
use App\Models\BioData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function index()
    {
        $lgas = DB::table('lgas')->where('state_id', 14)->get(['state_id', 'name']);
        return view('profile')->with(['lgas' => $lgas]);
    }
    public function storeBiodata(StoreBiodataRequest $request)
    {
        $data = $request->validated();

        $fileName = time() . '.' . $data['passport']->extension();



        $data['passport']->move(public_path('uploads/passports'), $fileName);
        $url = 'uploads/passports/' . $fileName;

        BioData::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'passport_number' => $data['passport_number']
            ],
            [


                'gender' => $data['gender'],
                'birthday' => $data['birthday'],
                'lga' => $data['lga'],
                'phone' => $data['phone'],
                'place_of_birth' => $data['place_of_birth'],
                'address' => $data['address'],
                'town' => $data['town'],
                'occupation' => $data['occupation'],
                'height' => $data['height'],
                'next_of_kin' => $data['next_of_kin'],
                'marital_status' => $data['marital_status'],
                'next_of_kin_phone' => $data['next_of_kin_phone'],
                'passport' => $url

            ]
        );
        return to_route('application.medical-history')->with('success', 'Your Biodata is saved!');
    }
}
