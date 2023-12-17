<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Respuestas; // Cambiar Movie por Game
use Illuminate\Http\Request;

class RespuestasController extends Controller
{
    // ...

   public function index()
    {
       $games = Respuestas::all();
       
   return view('respuesta.index', ['games' => $games]);
    }

    // ...

    

      public function create()
    {
        $preguntas = Game::all();
        return view('respuesta.create',['preguntas' => $preguntas]);
    }

        public function store(Request $request)
    {
        //1º generar el objeto para guardar

        $game = new Respuestas($request->all());
        $game->id_pregunta = $request->input('id_pregunta');
        $game->fill($request->except('id_pregunta'));
         
        try{
            //2º intentar guardar el objeto
             $result = $game->save();
             //3º si se guarda volver algun sitio : index , create
             
             
             $checked = session('afterInsert', 'show games');
            $target='respuesta';
        
        if($checked != 'show games'){
            $target = $target.'/create';
           
        }
                  $this->validate($request, [
                        'respuesta' => 'required|max:255', // Limita el título a 255 caracteres
                         'esCorrecta' => 'required|max:1|numeric',
                           'id_pregunta' => 'required|numeric'
            ]);
    
             return redirect($target)->with(['message'=> 'The movie has been seaved']);//no hace falta poner url('movie/create') ya que lo hace redirect
        }catch(\Exception $e){
             //4º Si no lo he guardado volver para tras con los datoas rellenos
            return back() -> withInput()->withErrors(['message'=> 'The movie has not been seaved']);//volvemos para atras con los datos que me llegan 
        }
    }
     public function edit($idgame)
    {  
        $preguntas = Game::all();
         $game = Respuestas::find($idgame);
    
      return view('respuesta.edit', ['game' => $game], ['preguntas' => $preguntas]);
    }
     public function show(Respuestas $game)
    {

         return view('respuesta.show', ['game' => $game]);
    }
    public function update(Request $request, $idgame)
    {
          $game = Respuestas::find($idgame);
        
        try {
           
         
        $game->id_pregunta = $request->input('id_pregunta');
        $game->fill($request->except('id_pregunta'));

// Intentar guardar los cambios
        $result = $game->save();

// Resto del código...

    
            return redirect('respuesta')->with(['message' => 'The game has been updated']);
            
            // Si se guardó correctamente, redirigir a alguna vista, por ejemplo, la lista de juegos
        } catch (\Exception $e) {
            // En caso de error al guardar, regresar a la página anterior con los datos para corregir
            return back()->withInput()->withErrors(['message' => 'The game has not been updated']);
        }
    }
    public function destroy($idgame)
    {
        $game = Respuestas::find($idgame);
       
        try {
            $game->delete();
            return redirect('respuesta')->with(['message' => 'The movie has been deleted.']);
        } catch(\Exception $e) {
            return back()->withErrors(['message' => 'The movie has not been deleted.']);
}
        
    }
}

