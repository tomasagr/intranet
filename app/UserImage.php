<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    protected $table = 'users_images';
    protected $fillable = ['file', 'user_id'];
}
