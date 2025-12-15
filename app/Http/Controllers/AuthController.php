<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerEmployee(Request $request){
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

        $token = $employee->createToken('employee-token')->plainTextToken;

        return response()->json([
            'message'=>'Registration Successful',
            'token'=>$token,
            'employee'=>$employee,
        ],201);
    }

    public function loginEmployee(Request $request){
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

        $token = $employee->createToken('employee-token')->plainTextToken;

        return response()->json([
            'message' => 'Login succesful',
            'token' => $token,
        ],200);
    }

    public function logoutEmployee(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'Logged Out'
        ]);
    }

    public function registerEmployer(Request $request){
        $data = $request->validate([
            'companyName'=> 'required|string',
            'email'=> 'required|email|unique:employers',
            'password'=> 'required|min:6',
            'phone'=> 'required|min:10|max:10',
        ]);

        $employer = Employer::create([
            'companyName' => $data['companyName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone'=>$data['phone'],
        ]);

        $token = $employer->createToken("employer-token")->plainTextToken;

        return response()->json([
            'message'=>'Registration Successful',
            'token'=>$token,
            'employer'=>$employer,
        ],201);
    }

    public function loginEmployer(Request $request){
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        $employer = Employer::where('email', $data['email'])->first();
        if(!$employer || !Hash::check($data['password'], $employer->password)){
            return response()->json([
                'message'=>'Employer invalid',

            ],401);
        }

        $token = $employer->createToken("employer-token")->plainTextToken;

        return response()->json([
            'message' => 'Login succesful',
            'token' => $token,
        ],200);
    }

    public function logoutEmployer(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'Logged Out'
        ]);
    }

}
