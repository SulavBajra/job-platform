<?php

namespace App\Http\Controllers;

use App\Models\jobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
   public function applyForJob(Request $request){
        $employee=$request->user();
        
   }
}
