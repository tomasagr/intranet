<?php

namespace Intranet;
use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    protected $table = 'profile';

    protected $fillable = [
        'family', 'live', 'nojob',
        'tasks', 'book', 'color', 
        'movie', 'admire', 'food',
        'island', 'music', 'beach',
        'place', 'user_id'
    ];
}
