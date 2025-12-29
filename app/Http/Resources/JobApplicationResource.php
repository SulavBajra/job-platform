<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name'=>$this->employee->name,
            'email'=>$this->employee->email,
            'number'=>$this->employee->number,
            'description'=>$this->employee->description,
            'location'=>$this->employee->location,
            'skills'=>$this->employee->skills,
            'experience'=>$this->employee->experience,
            'education'=>$this->employee->education,
        ];
    }
    //ToDO:
    //Addding for CV files
}
