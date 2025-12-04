<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
use App\Models\Applicant;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job_listings';
    protected $fillable = ['title', 'description', 'salary', 'tags',
    'requirements', 'benefits', 'address', 'city', 'job_type', 'remote', 'state', 'zipcode', 'contact_email',
    'contact_phone', 'company_name', 'company_description', 'company_logo', 'company_website', 'user_id'];
    
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);   
    }

    // relation to booksmarks
    public function bookmarkedByUsers(): BelongsToMany {
        return $this->belongsToMany(User::class, 'job_user_bookmarks')->withTimestamps();
    }

    // relation to applicants
    public function applicants ():HasMany {
        return $this->hasMany(Applicant::class);
    }

}

