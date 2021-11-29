<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    // ADMIN
    public function adminLoginShow()
    {
        if (Auth::guard('admin')->user()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if admin is Active
        $check = Admin::where('email', $request->email)->first();
        if ($check && $check->status == 'გაუქმებული') {
            return redirect()->back()->withErrors(['მომხმარებული გაუქმებულია']);
        }


        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->withErrors(['ელფოსტა ან პაროლი არ არის სწორი. სცადეთ ახლიდან']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
