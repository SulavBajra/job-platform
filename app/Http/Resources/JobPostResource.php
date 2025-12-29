<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobPostResource extends JsonResource
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
            'company: ' => $this->employer->companyName,
            'title' => $this->title,
            'type' => $this->type,
            'salary' => $this->salary,
            'description' => $this->description,
            'location' => $this->location,
            'deadline' => $this->deadline,
        ];
    }
}
