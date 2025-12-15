<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models\Employer;

class JobPostController extends Controller
{
  public function createJobPost(Request $request){
    $employer = $request->user();

    if(!Employer::findOrFail($employer->id)){
        return response()->json([
            'message'=>'UnAuthenticated'
        ],302);
    }

    $data = $request->validate([
        'title'=>'required|string',
        'type'=>'nullable|string',
        'salary'=>'required|string',
        'description'=>'required',
        'location'=>'required|string',
        'deadline'=>'nullable|date',
    ]);


    $post = JobPost::create([
        'employer_id'=>$employer->id,
        'title'=>$data['title'],
        'type'=>$data['type'],
        'salary'=>$data['salary'],
        'description'=>$data['description'],
        'location'=>$data['location'],
        'deadline'=>$data['deadline'],
    ]);

    return response()->json([
        'message'=>'Created Post'
    ]);

  }
}
