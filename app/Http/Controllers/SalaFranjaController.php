<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Salas;

class SalaFranjaController extends Controller
{
    public function store(Request $request, $id) 
    {
        $data = $request->all();
        $sala = Salas::find($id);

        $res = $sala->franja()->create($data);

        if ($res) {
            \Flash::success('Franja creada con exito');
            return redirect()->back();
        }
    }
}
