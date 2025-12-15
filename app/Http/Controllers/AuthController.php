<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name'=> 'required|string',
            'email'=> 'required|email|unique:employees',
            'password'=> 'required|min:6',
            'number'=> 'required|min:10|max:10',
        ]);

        $employee = Employee::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'number'=>$data['number'],
        ]);

        $token = $employee->createToken('api-token')->plainTextToken;

        return response()->json([
            'message'=>'Registration Successful',
            'token'=>$token,
            'employee'=>$employee,
        ],201);
    }

    public function login(Request $request){
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        $employee = Employee::where('email', $data['email'])->first();
        if(!$employee || !Hash::check($data['password'], $employee->password)){
            return response()->json([
                'message'=>'Account invalid',

            ],401);
        }

        $token = $employee->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login succesful',
            'token' => $token,
        ],200);
    }

}
