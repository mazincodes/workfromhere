<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Job;
use App\Models\User;

class Applicant extends Model
{
    protected $fillable = [
        'user_id',
        'job_id',
        'full_name',
        'contact_email',
        'contact_phone',
        'message',
        'location',
        'resume_path'
    ];

    // relation to job
    public function job():BelongsTo {
        return $this->belongsTo(Job::class);
    }

    // relation to user
    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
}
