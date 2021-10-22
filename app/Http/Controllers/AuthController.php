<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function RegisterUser(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $password = bcrypt($request->password);

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $password,
                'phone' => $request->phone,
                'gender' => $request->gender,
            ]);
        return $user;
    }
}
