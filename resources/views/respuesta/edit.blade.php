@extends('app.base')

@section('title', 'Edit Game')

@section('content')

    <form action="{{ url('respuesta/' . $game->id) }}" method="post">
        @csrf
        @method('put')
    
        <!-- Inputs del formulario -->
        <div class="mb-3">
            <label for="respuesta" class="form-label">respuesta</label>
            <input type="text" class="form-control" id="respuesta" name="respuesta" maxlength="60" required value="{{ old('respuesta', $game->respuesta) }}">
        </div>
<div class="mb-3">
    <label for="esCorrecta" class="form-label">EsCorrecta</label>
    <select class="form-control" id="esCorrecta" name="esCorrecta" required>
        <option value="1" {{ old('esCorrecta', $game->esCorrecta) == 1 ? 'selected' : '' }}>Sí</option>
        <option value="0" {{ old('esCorrecta', $game->esCorrecta) == 0 ? 'selected' : '' }}>No</option>
    </select>
</div>
         <div class="mb-3">
 <select name="id_pregunta" id="preguntas" class="form-control">
        @foreach($preguntas as $pregunta)
            <option value="{{ $pregunta->id }}" {{ $pregunta->id == $game->id_pregunta ? 'selected' : '' }}>
                {{ $pregunta->pregunta }}
            </option>
        @endforeach
    </select>
         </div>
        <button type="submit" class="btn btn-success">Submit</button>
          <a href="{{ url('respuesta/') }}" class="btn btn-primary">Back</a>
        
         

    </form>         <form class="formDelete" action="{{ url('respuesta/' . $game->id) }}" method="post" style="display: inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn-danger btn" type="submit" >Delete</button>
                    </form>
       
    <script>
    const forms = document.querySelectorAll(".formDelete");
    forms.forEach(function(form){
        form.onsubmit = () => {
            return confirm("Seguro?");
        }
    });
    

</script>    
@endsection
