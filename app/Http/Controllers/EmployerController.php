<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
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
        ]);

        $employeer = $request->user();
        $employer->update($data);

        return response()->json([
            'message' => 'Profile Updated',
        ]);
    }

    public function editProfile(Request $request){
        $data = $request->validate([
            'companyName'=> 'required|string',
            'email'=> 'required|email|unique:employees',
            'phone'=> 'required|min:10|max:10',
            'description' => 'nullable|string',
            'location'=> 'nullable|string',
        ]);

        $employer = $request->user();
        $employer->update($data);
        $employer->refresh();

        return response()->json([
            'message' => 'Profile Updated',
        ]);
    }


    
}
