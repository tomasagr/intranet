<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Salas;

class SalasController extends Controller
{
    public function index() 
    {
        $salas = Salas::all();
        return view('panel.salas.index', compact('salas'));
    }

    public function show($id) 
    {
        $sala = Salas::with(['franja', 'reservas'])->find($id);
        return view('panel.salas.show', compact('sala'));
    }

    public function byTag($tag) 
    {
        $sala = Salas::with(['franja', 'reservas'])->where('tag', $tag)->first();
        return response()->json($sala);
    }
}
