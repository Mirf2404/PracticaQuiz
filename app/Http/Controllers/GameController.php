<?php

namespace App\Http\Controllers;

use App\Models\Game; // Cambiar Movie por Game
use Illuminate\Http\Request;

class GameController extends Controller
{
    // ...

   public function index()
    {
       $games = Game::all();
       
   return view('game.index', ['games' => $games]);
    }

    // ...

    

      public function create()
    {
        
        return view('game.create');
    }

        public function store(Request $request)
    {
        //1º generar el objeto para guardar
        
        $game = new Game($request->all());
        
         
        try{
            //2º intentar guardar el objeto
             $result = $game->save();
             //3º si se guarda volver algun sitio : index , create
             
             
             $checked = session('afterInsert', 'show games');
            $target='game';
        
        if($checked != 'show games'){
            $target = $target.'/create';
           
        }
                    $this->validate($request, [
                        'pregunta' => 'required|max:255', // Limita el título a 255 caracteres
                      
            ]);
    
             return redirect($target)->with(['message'=> 'The movie has been seaved']);//no hace falta poner url('movie/create') ya que lo hace redirect
        }catch(\Exception $e){
             //4º Si no lo he guardado volver para tras con los datoas rellenos
            return back() -> withInput()->withErrors(['message'=> 'The movie has not been seaved']);//volvemos para atras con los datos que me llegan 
        }
    }
     public function edit(game $game)
    {
      return view('game.edit', ['game' => $game]);
    }
     public function show(game $game)
    {

         return view('game.show', ['game' => $game]);
    }
    public function update(Request $request, Game $game)
    {
        try {
            // Actualizar los campos con los nuevos datos del formulario
            $game->fill($request->all());

            // Intentar guardar los cambios
            $result = $game->save();
            $this->validate($request, [
                        'pregunta' => 'required|max:255', // Limita el título a 255 caracteres
                       
            ]);
    
            return redirect('game')->with(['message' => 'The game has been updated']);
            
            // Si se guardó correctamente, redirigir a alguna vista, por ejemplo, la lista de juegos
        } catch (\Exception $e) {
            // En caso de error al guardar, regresar a la página anterior con los datos para corregir
            return back()->withInput()->withErrors(['message' => 'The game has not been updated']);
        }
    }
    public function destroy(game $game)
    {
        dd($game);
        try {
            $game->delete();
            return redirect('game')->with(['message' => 'The movie has been deleted.']);
        } catch(\Exception $e) {
            return back()->withErrors(['message' => 'The movie has not been deleted.']);
}
        
    }
}

