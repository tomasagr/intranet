<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;
use Intranet\Models\Panel\Productos;

class CategoryProduct extends Model
{
    protected $table = 'category_products';
    protected $fillable = ['name'];

    public function products()
    {
    	return $this->hasMany(Productos::class, 'category_id', 'id');
    }
}
