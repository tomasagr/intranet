<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Models\Panel\Noticias;

class NewsController extends Controller
{
    public function index(Request $request) 
    {
        if ($request->limit) {

            if ($request->category) {
                return Noticias::with(['sector', 'category'])
                    ->where('category_id', '!=', 3)
                    ->where('category_id', $request->category)
                    ->orderBy('created_at', 'desc')
                    ->limit($request->limit)
                    ->get();
            }

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
        $informal = Noticias::with(['sector', 'category'])
                                ->where('category_id', 1)
                                ->orderBy('created_at', 'desc')->get();
    	return view('news.informal', compact('informal'));
    }

    public function institutional()
    {
        $institutional = Noticias::with(['sector', 'category'])
                                ->where('category_id', 2)
                                ->orderBy('created_at', 'desc')->get();
    	return view('news.institutional', compact('institutional'));
    }

    public function show($id) 
    {
        $noticia = Noticias::with(['sector', 'category'])
                            ->where('category_id','!=', 3)
                            ->find($id);

        $ultimas = Noticias::with(['sector', 'category'])
                            ->where('id', '!=', $id)
                            ->where('category_id', '!=', 3)        
                            ->orderBy('created_at', 'desc')
                            ->get();
    	return view('news.individual', compact('noticia', 'ultimas'));
    }

    public function showInformal($id) 
    {
        $noticia = Noticias::with(['sector', 'category'])
                            ->where('category_id','!=', 3)
                            ->where('category_id', 1)
                            ->find($id);

        $ultimas = Noticias::with(['sector', 'category'])
                            ->where('id', '!=', $id)
                            ->where('category_id', '!=', 3)
                            ->where('id', '!=', $id)    
                            ->where('category_id', 1)    
                            ->orderBy('created_at', 'desc')
                            ->get();
    	return view('news.individual', compact('noticia', 'ultimas'));
    }

    public function showInstitucional($id) 
    {
        $noticia = Noticias::with(['sector', 'category'])
                            ->where('category_id','!=', 3)
                            ->where('category_id', 2)
                            ->find($id);

        $ultimas = Noticias::with(['sector', 'category'])
                            ->where('id', '!=', $id)
                            ->where('category_id', '!=', 3)
                            ->where('id', '!=', $id)    
                            ->where('category_id', 2)    
                            ->orderBy('created_at', 'desc')
                            ->get();
    	return view('news.individual', compact('noticia', 'ultimas'));
    }

    public function sector($id) 
    {
        $institutional = Noticias::where('category_id', 2)->where('sector_id', $id)->get();
        $informal = Noticias::where('category_id', 1)->where('sector_id', $id)->get();
        $sector = Noticias::limit(2)->where('sector_id', $id)->get();
    	return view('news.sector', compact('institutional', 'informal', 'sector'));
    }

}
