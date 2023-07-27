<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function signup()
    {
        return view('client.page.signup');
    }
    public function signin()
    {
        return view('client.page.signin');
    }
    public function admin()
    {
        return view('admin.page.account.index');
    }

}
