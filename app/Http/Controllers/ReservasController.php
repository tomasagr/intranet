<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Reserva;
use Intranet\Mail\DeleteReservation;

class ReservasController extends Controller
{
    public function index() 
    {
        return view('panel.reservas.index');
    }

    public function delete($id) 
    {
        $reserva = Reserva::with('user', 'franja', 'sala')->find($id);
        
        \Mail::to($reserva->user)->send(new DeleteReservation($reserva));
        

        $reserva->delete();
        
        \Flash::success('Eliminado con éxito');
        return redirect()->back();
    }
}
