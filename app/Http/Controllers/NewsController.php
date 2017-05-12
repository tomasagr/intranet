<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
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
