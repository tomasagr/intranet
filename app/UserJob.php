<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    protected $table = 'user_job';
    protected $fillable = ['user_id', 'job_id'];
}
