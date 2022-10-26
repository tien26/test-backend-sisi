<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PersonalController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        if (Auth::attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ])) {
            $data = User::find(1);

            $token = $data->createToken('Token Name')->accessToken;

            return response()->json([
                'token' => $token
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'succes' => 'logout'
        ]);
    }
}
