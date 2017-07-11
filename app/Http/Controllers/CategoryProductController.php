<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\CategoryProduct;

class CategoryProductController extends Controller
{
    public function index()
    {
    	return CategoryProduct::all();
    }
}
