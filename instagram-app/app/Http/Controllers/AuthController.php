<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function check() {
        return 'Varototojas yra prisijungęs';
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'required|email|min:3|max:50',
            'password' => 'required|min:6|max:20'
        ]);

        if(!auth()->attempt($data))
            return response('Neteisingi prisijungimo duomenys', 401);

        //Vartotojo informacijai susigrąžinti
        //auth()->user()

        return [
            'message' => 'Prisijungimas sėkmingas',
            'token' => auth()->user()->createToken('react')->plainTextToken
        ];
    }
}
