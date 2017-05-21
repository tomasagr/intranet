<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Models\Panel\Manuales;

class ManualsController extends Controller
{
    public function index()
    {
    	return view('manuals.index');
    }

    public function getAll() 
    {
        return Manuales::with('sector')->get();
    }
}
