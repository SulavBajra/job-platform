<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employer;
use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class JobPost extends Model
{
   protected $fillable=['employer_id','title','type','salary','description','location','deadline'];

   public function employer(): BelongsTo
   {
    return $this->belongsTo(Employer::class);
   }

   public function jobApplications(): HasMany
   {
    return $this->hasMany(JobApplication::class);
   }
}
