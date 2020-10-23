<?php

namespace App\Http\Controllers\Aplicacion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contacto\StorePost;
use App\Models\Contacto;
use App\Models\Evento;
use App\Models\MaterialAprendizaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EscritorioController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function verEscritorio(Request $request)
    {
        return view('aplicacion.escritorio.escritorio');
    }

    public function verEventos(Request $request)
    {

        $eventos=Evento::orderbyDesc('fecha','hora')->where('user_id',Auth::id())->get();
        $eventoscount=count($eventos);
        return view('aplicacion.escritorio.contenidoeventos',compact('eventos','eventoscount'));
        
    }
    public function verMateriales(Request $request)
    {

        $materiales=MaterialAprendizaje::orderbyDesc('fecha_publicacion')->where('user_id',Auth::id())->get();
        $materialescount=count($materiales);
        return view('aplicacion.escritorio.contenidomateriales',compact('materiales','materialescount'));
        
    }

}
