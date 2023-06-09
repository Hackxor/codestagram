<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
   public  function registro() {
        return view('auth.register');
    }

   public function store(Request $request){
    // obteniendo valores
        // dd($request -> get('nombre'));

    // modificando el request
    $request->request->add(['username'=> Str::slug($request->username)]);

    // Validacion
    $this -> validate($request, [
        'name' => 'required | max:30',
        'username' => 'required|unique:users|min:3|max:20',
        'email' => 'required|unique:users|email|max:60',
        'password' => 'required|confirmed|min:6'
        
    ]);
// usando ORM------
// insertando registros
    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

// autenticar usuario
    // auth()->attempt([
    //     'email' => $request->email,
    //     'password' => $request->password,
    // ]);

    auth()->attempt($request->only('email','password'));



// redireccionar
    return redirect()->route('posts.index');

}
}
