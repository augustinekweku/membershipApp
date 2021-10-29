<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        $this->validate($request, [
            'loginEmail' => 'bail|required|email',
            'loginPassword' => 'bail|required|min:6',
        ]);
        if (Auth::attempt(['email' => $request->loginEmail, 'password' => $request->loginPassword, ])) {
            $user = Auth::user();
            //return $user;          
            return response()->json([
                'msg' => 'You are logged in',
                'user' => $user
            ]);
        }else {
            return response()->json([
                'msg' => 'Incorrect Login details '
            ], 401);    }
        
    }

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
            $user->save();
            Auth::login($user);
            return Auth::user();
    }
    public function logout() 
    {
        Auth::logout();
        return redirect('/register');
    }
}
