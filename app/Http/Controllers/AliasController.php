<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class AliasController extends Controller
{
// AliasController.php


  public function showForm()
    {
        return view('Client/index');
    }

    public function saveAlias(Request $request)
    {
        $alias = $request->input('alias');
        Session::put('alias', $alias);

       return redirect()->route('kahoot.index', ['alias' => $alias])->with('message', 'Alias guardado en la sesión.');

    }

public function mostrarAlias()
{
    $alias = session('alias');
    return view('nombre_de_tu_vista', ['alias' => $alias]);
}


}
