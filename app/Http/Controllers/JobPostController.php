<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Http\Resources\JobPostResource;

class JobPostController extends Controller
{
  public function createJobPost(Request $request){
    $employer = $request->user();

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

  public function deleteJobPost($postId){

    $post = JobPost::findOrFail($postId);

    if(!$post){
        return response()->json([
            'message'=>'Post not Found'
        ],409);
    }

    $post->delete();

    return response()->json([
        'message'=>'Deleted Post'
    ]);

  }

  public function viewAllJobs(){
    $posts = JobPost::with('employer')->get();
    if(!$posts){
        return response()->json('No Job Post Found');
    }
    return JobPostResource::collection($posts);
  }

  public function show($postId){
    $post = JobPost::with('employer')->find($postId);
    if(!$post){
        return response()->json('No Job Post Found');
    }
    return new JobPostResource($post);
  }

}
