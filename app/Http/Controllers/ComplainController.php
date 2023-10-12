<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplainRequest;
use App\Models\Complain;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    public function index()
    {

        return view('complains');
    }
    public function store(ComplainRequest $request)
    {
        $data = $request->validated();
        $fileName = time() . '.' . $data['complain_file']->extension();



        $data['complain_file']->move(public_path('uploads/complain'), $fileName);
        $url = 'uploads/complain/' . $fileName;
        Complain::create([
            'user_id' => auth()->user()->id,
            'complain' => $data['complain'],
            'complain_file' => $url,
        ]);
        return redirect()->back()->with('success', 'Complain Saved');
    }
}
