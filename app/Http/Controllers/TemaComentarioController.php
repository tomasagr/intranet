<?php

namespace Intranet\Http\Controllers;

use Illuminate\Http\Request;
use Intranet\Models\Foro;
use Intranet\Models\Tema;
use Intranet\Models\Comentario;
use Intranet\Mail\ComentarioNuevo;
use Intranet\Notifications\ComentarioNotificacion;

class TemaComentarioController extends Controller
{
    public function store(Request $request, $foro, $tema) 
    {
        $foro = Foro::find($foro);
        $tema = Tema::find($tema);

        $comentario = Comentario::create([
            'user_id' => \Auth::user()->id,
            'cuerpo' => $request->cuerpo,
            'tema_id' => $tema->id,
            'foro_id' => $tema->foro_id,
        ]);

        $tema->update(['response' => 1]);
            
        if ($tema->autor->id != \Auth::user()->id) {
            \Mail::to($tema->autor)->send(new ComentarioNuevo($tema));
            $tema->autor->notify(new ComentarioNotificacion($comentario));
        }

        return redirect()->back();
    }
}
