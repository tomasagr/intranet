<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\SalaFranja;;
use Intranet\Salas;
use Intranet\Reserva;

class FranjaController extends Controller
{
    public function store(Request $request, $id) 
    {
        $franja = SalaFranja::find($id);
        $sala = Salas::where('tag', $request->sala_tag)->first();
        $res = Reserva::create([
            'fecha' => $request->fecha,
            'sala_id' =>  $sala->id,
            'franja_id' => $id,
            'user_id' => $request->user_id
        ]);

        if ($res) {
            return Reserva::where('sala_id', $sala->id)->get();
        }
    }

    public function delete($id) 
    {
        $franja = SalaFranja::find($id)->delete();
        return redirect()->back();
    }
}
