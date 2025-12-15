<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  
    public function index()
    {
        return response()->json(Employee::paginate(10));
    }

    public function showProfile(Request $request){
        return response()->json($request->user());
    }

    public function updateProfile(Request $request){
        $data = $request->validate([
            'description' => 'nullable|string',
            'location'=> 'nullable|string',
            'skills'=> 'nullable|array',
            'experience'=>'nullable|string',
            'education'=>'nullable|string',
            'file'=>'nullable|file',
        ]);

        $employee = $request->user();
        $employee->update($data);
        $employee->refresh();

        return response()->json([
            'message' => 'Profile Updated',
            'employee' => $employee,
        ]);
    }

    public function editProfile(Request $request){
        $data = $request->validate([
            'name'=> 'required|string',
            'email'=> 'required|email|unique:employees',
            'password'=> 'required|min:6',
            'number'=> 'required|min:10|max:10',
            'description' => 'nullable|string',
            'location'=> 'nullable|string',
            'skills'=> 'nullable|array',
            'experience'=>'nullable|string',
            'education'=>'nullable|string',
            'file'=>'nullable|file',
        ]);

        $employee = $request->user();
        $employee->update($data);
        $employee->refresh();

        return response()->json([
            'message' => 'Profile Updated',
            'employee' => $employee,
        ]);
    }



}
