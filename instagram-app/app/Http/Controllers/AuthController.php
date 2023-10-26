<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        return response(
            [
                'message' => 'Prisijungimas sėkmingas',
                'token' => auth()->user()->createToken('react')->plainTextToken
            ]
        );
    }

    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|min:6|max:20',
            'password' => 'required|min:6|max:20',
            'bio' => 'max:128',
            'photo' => 'mimes:jpg,png,gif' 
        ]);

        try {
            $data['photo'] = $request->file('photo')->store('public');
            $user = User::create($data);
            
            return response(
                [
                    'message' => 'Registracija sėkminga',
                    'token' => $user->createToken('react')->plainTextToken
                ]
            );

        } catch(\Throwable $e) {
            return response('Nepavyko sukurti vartotojo.', 401);
        }
    }

    public function logout() {
        try {
            // \Illuminate\Support\Facades\Auth::user();
            auth()->user()->tokens->each(function ($token) {
                $token->delete();
            });

            return 'Jūs sėkmingai atsijungėte';
        } catch(\Throwable $e) {
            return response('Atsijungti nepavyko', 500);
        }
    }
}
