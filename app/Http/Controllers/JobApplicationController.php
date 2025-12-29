<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Resources\JobApplicationResource;

class JobApplicationController extends Controller
{
   public function applyForJob(Request $request, $jobId){
      $employee=$request->user();

      $applicationStatus = JobApplication::where('job_post_id', $jobId)->where('employee_id',$employee->id)->exists();

      if($applicationStatus){
         return response()->json(['message'=>'Already Applied'],409);

      }
   
      JobApplication::create([
         'job_post_id' => $jobId,
         'employee_id' => $employee->id,
      ]);

      return response()->json(['message'=>'Succesfully Applied']);
   }

   public function viewApplications(Request $request){
      $employer = $request->user();

      $applications = JobApplication::with('employee')->get();

      if(!$applications){
         return response()->json("No Applications Yet");
      }

      return JobApplicationResource::collection($applications);
   }

}
