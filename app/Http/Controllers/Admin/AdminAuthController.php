<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{
    // get view form
    public function showForm()
    {
      return view('admin.login');
    }
    // Login
    public function Login(Request $request){
        $data = $request->validate([
          'email' => 'required|email',
          'password' => 'required'
        ]);

        if( auth()->guard('admin')->attempt($data) )
        {
          return redirect()->route('admin.');
        }

        return back()->with('error', __('auth.failed'));
    }
}
