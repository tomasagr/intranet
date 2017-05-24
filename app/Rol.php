<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;
use Intranet\Permission;

class Rol extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name', 'tag'];

    public function permissions() 
    {
        return $this->belongsToMany(Permission::class, 'permission_rol', 'rol_id', 'permission_id');
    }
}
