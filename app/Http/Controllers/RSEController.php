<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Models\Panel\Contenido;

class RSEController extends Controller
{
    public function solidaria()
    {
        $contenido = Contenido::where('tag', 'SOLIDARIA')->first();
    	return view('rse.solidaria', compact('contenido'));
    }

    public function regional()
    {
        $contenido = Contenido::where('tag', 'REGIONAL')->first();
    	return view('rse.regional', compact('contenido'));
    }

    public function begreen()
    {
        $contenido = Contenido::where('tag', 'BEGREEN')->first();
    	return view('rse.begreen', compact('contenido'));
    }
}
