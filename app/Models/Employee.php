<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable 
{
    use HasFactory,HasApiTokens;

    protected $fillable = 
    ['name','email','password','number','description','location','skills','experience','education','file'];
    protected $hidden = ['password','remember_token'];

    protected $casts = [
        'skills' => 'array',
    ];

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

}
