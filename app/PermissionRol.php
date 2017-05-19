<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;

class PermissionRol extends Model
{
    protected $table = 'permission_rol';
    protected $fillable = ['permission_id', 'rol_id'];
}
