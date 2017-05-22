<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Unit;

class UnitsController extends Controller
{
    public function index()
    {
        return Unit::with('sectors')->get();
    }
}
