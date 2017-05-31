<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Reserva;
use Intranet\SalaFranja;

class SalasReservasController extends Controller
{
    public function show($id, $fecha) 
    {  
        $reservas = Reserva::with(['user', 'franja'])->whereDate('fecha', $fecha)->where('sala_id', $id)->get();
        $franjas = SalaFranja::where('sala_id', $id)->get();

        $newFranjas = $franjas->map(function($f) use ($reservas){
          $res = $reservas->filter(function ($r) use ($f) {
             return $r->franja_id == $f->id;
          });
          
         if (!count($res)) {
             return $f;
         } 
        });

        return response()->json(['reservas' => $reservas, 'franja' => $newFranjas]);
    }
}
