<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function store(Request $request)
    {
        $creds = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($creds)) return redirect()->to('admin');

        return redirect()->to('login')
            ->withInput()
            ->with('message','Invalid Credentials');
    }
}
