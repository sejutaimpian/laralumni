<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'profile' => $this->profile
        ];

        return view('home/login', $data);
    }
}
