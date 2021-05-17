<?php

namespace App\Http\Controllers;

use App\Commet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommetController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'body'=>'required'
        ]);
        $input = $request->all();
        $input['user_id'] = \Auth::user()->id; /* Obtiene el id del Usuario Logueado */
        /* Se crea el registro y se almacena en la tabla de Comentarios */
        Commet::create($input);
        return back()->with('info', 'El comentario está siendo evaluado por un administrador.');
    }

    
    public function destroy(Commet $commet)
    {
        $commet->delete();
        return back()->with('info', 'Comentario eliminado con éxito');
    }
}
