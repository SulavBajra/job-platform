<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobPost;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Employer extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = ['companyName','password','location','description','phone','email'];
    protected $hidden = ['password','remember_token'];

    public function jobPosts(): HasMany
    {
        return $this->hasMany(JobPost::class);
    }

}
