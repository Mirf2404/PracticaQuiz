<!-- resources/views/kahoot/index.blade.php -->

@extends('app.base')
@section('title', 'Argo Create Game')

@section('content')
    <h1>Kahoot</h1>

    <div>
        @foreach($preguntas as $pregunta)
            <div>
                <h2>{{ $pregunta->pregunta }}</h2>

             
                    @foreach($pregunta->respuestas as $respuesta)
                   
                        <form method="post" action="{{ route('verificar.respuesta', ['preguntaId' => $pregunta->id, 'respuestaId' => $respuesta->id]) }}">
                            @csrf
                             <div class="mb-3">
                           <button type="submit" class="btn btn-primary">{{ $respuesta->respuesta }}</button>
                           </div>
                        </form>
                    
                  
                    @endforeach
                    
               
            </div>
        @endforeach
        
             @if(session('pregunta'))
                        <p>{{ '¡Respuesta correcta!' }}</p>
                        @else
                        <p>{{ 'Respuesta incorrecta.' }}</p>
                        @endif
    </div>
        <table class="table table-striped table-sm">
        <thead>
            <tr>  <th scope="col">name</th>
                <th scope="col">Pregunta</th>
                   <th scope="col">id</th>
                <th scope="col">acertado</th>
                    <th scope="col">respuesta</th>
        
            </tr>
        </thead>
        <tbody>
            
   @foreach($Historial as $historial)
    @if($historial->name == session('alias'))
        <tr>
            <td>{{ $historial->name }}</td>
            <td>{{ $historial->pregunta }}</td>
            <td>{{ $historial->id }}</td>
            <td>{{ $historial->acertado }}</td>
            <td>{{ $historial->respuesta }}</td>
        </tr>
    @endif
@endforeach
               
         
            </tbody>
            </table>
          <a href="./Client" class="btn-danger btn">Client</a>
@endsection