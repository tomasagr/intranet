<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Models\Panel\Noticias;

class NewsController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->limit) {
            return Noticias::with(['sector', 'category'])
                ->where('category_id', '!=', 3)
                ->orderBy('created_at', 'desc')
                ->limit($request->limit)
                ->get();
        }

        return Noticias::with(['sector', 'category'])
                        ->where('category_id', '!=', 3)
                        ->orderBy('created_at', 'desc')->get();
    }

    public function informal()
    {
    	return view('news.informal');
    }

    public function institutional()
    {
    	return view('news.institutional');
    }

    public function show($id) 
    {
    	return view('news.individual');
    }

    public function sector($id) 
    {
    	return view('news.sector');
    }

}
