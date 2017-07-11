<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\CategoryProduct;
use Intranet\Models\Panel\Noticias;
use Intranet\Models\Panel\Productos;

class ProductssController extends Controller
{
    public function index()
    {
      $productos = Productos::all();
    	return view('products.index', compact('productos'));
    }

    public function show($id)
    {
      $producto = Productos::find($id);
      return view('products.show', compact('producto'));
    }

    public function apiIndex()
    {
      $productos = Productos::all();
      return $productos;
    }

    public function byCategory($id)
    {
      return CategoryProduct::find($id)->products;
    }
}
