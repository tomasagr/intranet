<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Models\Foro;
use Intranet\Models\Tema;

class ForumController extends Controller
{
    public function index(Request $request)
    {
    
        $foros = Foro::all();
        if ($request->q) {
            $temas = Tema::with('autor', 'foro')
                        ->where('nombre','LIKE',"%$request->q%")
                        ->orderBy('created_at', 'desc')
                        ->get();
        } else {
            $temas = Tema::with('autor', 'foro')
                        ->orderBy('created_at', 'desc')
                        ->get();
        }

    	return view('forum.index', compact('foros', 'temas'));
    }

    public function show(Request $request, $id)
    {
        $foro = Foro::find($id);
        if ($request->q) {
            $temas = Tema::with('autor', 'foro')
                       ->where('foro_id', $id)
                       ->where('nombre','LIKE',"%$request->q%")
                       ->orderBy('created_at', 'desc')
                       ->get();
        } else {
            $temas = Tema::with('autor', 'foro')
                       ->where('foro_id', $id)
                       ->orderBy('created_at', 'asc')
                       ->get();
        }
    	return view('forum.show', compact('foro', 'temas'));
    }

    public function topic($id)
    {
        $foros = Foro::all();
        $tema = Tema::find($id);
    	return view('forum.topic', compact('foros', 'tema'));
    }

    public function create(Request $request) 
    {
        $foros = Foro::all();
        if ($request->q) {
            $temas = Tema::with('autor', 'foro')
                        ->where('nombre','LIKE',"%$request->q%")
                        ->orderBy('created_at')
                        ->get();
        } else {
            $temas = Tema::with('autor', 'foro')
                        ->orderBy('created_at')
                        ->get();
        }

        return view('forum.create', compact('foros', 'temas'));
    }

    public function store(Request $request) 
    {
        $data = $request->all();
        $data["author_id"] = \Auth::user()->id;

        $tema = Tema::create($data);

        if ($tema) {
            \Flash::success('Tema creado con éxito');
            return redirect('/forum');
        }
    }
}
