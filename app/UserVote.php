<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;
use Intranet\Moldel;
class UserVote extends Model
{
    protected $table = 'user_vote';
    protected $fillable = ['user_id', 'profile_id', 'comments'];

    public function profile() 
    {
        return $this->belongsTo(User::class, 'profile_id');
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
