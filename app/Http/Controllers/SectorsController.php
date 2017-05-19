<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Sector;

class SectorsController extends Controller
{
    public function index()
    {
        return Sector::all();
    }
}
