<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

class ProductssController extends Controller
{
    public function index()
    {
    	return view('products.index');
    }
}
