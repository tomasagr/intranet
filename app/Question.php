<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
		protected $table = 'questions';
    protected $fillable = ['name'];
}
