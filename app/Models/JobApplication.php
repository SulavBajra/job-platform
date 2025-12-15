<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\JobPost;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    protected $fllable=['file','job_post_id','employee_id'];

    public function employees(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function jobPosts(): BelongsTo
    {
        return $this->belongsTo(JobPost::class);
    }

}
