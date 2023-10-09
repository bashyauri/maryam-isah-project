<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\StoreMedicalHistory;
use App\Models\MedicalHistory;
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
    public function store(StoreMedicalHistory $request)
    {
        $data = $request->validated();

        $fileName = time() . '.' . $data['medical_file']->extension();



        $data['medical_file']->move(public_path('uploads/medical'), $fileName);
        $url = 'uploads/medical/' . $fileName;
        MedicalHistory::create([
            'user_id' => auth()->user()->id,
            'url' => $url,
        ]);
        return redirect()->back()->with('success', 'Medical Records Uploaded!');
    }
}