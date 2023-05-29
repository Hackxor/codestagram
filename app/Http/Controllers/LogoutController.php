<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    // cerrando sesion 
    public function store(){
        auth()->logout();

        return redirect()->route('login');
    }
}
