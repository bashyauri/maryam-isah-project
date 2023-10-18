<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Services\Admin\LoginService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    public function __construct(
        protected LoginService $loginService
    ) {
    }
    public function showLoginForm(): View
    {

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login');
    }
}