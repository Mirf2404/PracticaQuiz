<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Respuestas;
use App\Models\Historial;
use Illuminate\Http\Request;

class KahootController extends Controller
{
        public function index()
    {
        $preguntas = Game::with('respuestas')->get();
          $Historial = Historial::All();
        return view('kahoot.index', compact('preguntas','Historial'));
    }
    
    public function verificarRespuesta(Request $request, $preguntaId, $respuestaId)
    {
        $pregunta = Game::find($preguntaId);
        $respuesta = Respuestas::find($respuestaId);

        if ($pregunta && $respuesta) {
            if($respuesta->esCorrecta == 1){
                $esCorrecta = $respuesta->esCorrecta;
             
    $historial = new Historial();

    $historial->name = session('alias') ;
    $historial->pregunta = $pregunta->pregunta;
    $historial->acertado = true;
    $historial->respuesta = $respuesta->respuesta;

    // Guardar el modelo en la base de datos
    $historial->save();
                
            // Almacena el resultado en la sesión
            session(['verificacion' => true, 'pregunta' => true]);
            
            return redirect()->route('kahoot.index');
            }else{
                  $historial = new Historial();

    $historial->name = session('alias') ;
    $historial->pregunta = $pregunta->pregunta;
    $historial->acertado = false;
    $historial->respuesta = $respuesta->respuesta;

    // Guardar el modelo en la base de datos
    $historial->save();
                 session(['verificacion' => true, 'pregunta' => false]);
                   return redirect()->route('kahoot.index');
            }
            
        }

        return abort(404);
    }
      public function verHistorial(Request $request)
    {
        $nombre = session('alias');

        // Obtener registros de historial según el nombre
        $historial = Historial::where('name', $nombre)->get();

        return view('kahoot.historial', compact('historial', 'nombre'));
    }
}
