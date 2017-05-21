<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Models\Panel\Contenido;
class AboutUsController extends Controller
{
    public function index()
    {
        $contenido = Contenido::where('tag', 'NOSOTROS')->first();
    	return view('aboutus.index', compact('contenido'));
    }
}
