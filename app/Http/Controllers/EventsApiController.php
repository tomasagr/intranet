<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Models\Panel\Eventos;
use Intranet\Models\Panel\Vacaciones;

class EventsApiController extends Controller
{
    public function index() 
    {
        return response()->json([
            'eventos' => Eventos::all(),
            'vacaciones' => Vacaciones::with('user')->get()
        ]);
    }

    public function show($date) 
    {
        return response()->json([
            'eventos' => Eventos::whereDate('fecha', $date)->get(),
            'vacaciones' => Vacaciones::with('user')->whereDate('fecha', '<=' ,$date)->get(),
        ]);
    }
}
