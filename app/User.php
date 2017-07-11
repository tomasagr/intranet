<?php

namespace Intranet;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Intranet\Permissions;
use Intranet\Profile;
use Intranet\Rol;
use Intranet\Sector;
use Intranet\Unit;
use Intranet\UserImage;
use Intranet\UserVote;

class User extends Authenticatable
{
    use Notifiable;

    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'password', 'position',
        'unit_id', 'sector_id', 'bio', 'rol_id', 'avatar', 'status', 'star', 'cover'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password) 
    {
        if (!empty($password)) {
            $this->attributes['password'] = \Hash::make($password);
        }
    }

    public function profile() 
    {
        return $this->hasOne(Profile::class)->orderBy('created_at', 'desc');
    }

    public function rol() 
    {
        return $this->belongsTo(Rol::class);
    }

    public function unit() 
    {
        return $this->belongsTo(Unit::class);
    }

    public function sector() 
    {
        return $this->belongsTo(Sector::class);
    }

    public function voting() 
    {
        return $this->hasMany('Intranet\UserVote', 'profile_id');
    }

     public function photos()
    {
        return $this->hasMany(UserImage::class, 'user_id', 'id');
    }
}
