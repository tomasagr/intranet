<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Unit;

class UnitSectorsController extends Controller
{
    public function show($id)
    {
    	$unit = Unit::with('sectors')->find($id);
    	return response()->json($unit);
    }
}
