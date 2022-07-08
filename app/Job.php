<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date_and_time',
        'job_requester',
        'job_receiver',
        'location',
        'reward',
    ];
}
