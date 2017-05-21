<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Models\Panel\Noticias;

class ProductssController extends Controller
{
    public function index()
    {
        $productos = Noticias::where('category_id', 3)
                               ->orderBy('created_at', 'desc')
                               ->get();
    	return view('products.index', compact('productos'));
    }

    public function show($id)
    {
        $noticia = Noticias::find($id);
        $ultimas = Noticias::where('category_id', 3)
                               ->orderBy('created_at', 'desc')
                               ->get();
    	return view('news.individual', compact('noticia','ultimas'));
    }
}
