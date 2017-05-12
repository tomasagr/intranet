<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function index()
    {
    	return view('diary.index');
    }
}
