@extends('app.base')
@section('title', 'Argo Create Game')
@section('content')
    <h2>Create respuesta</h2>

    <form action="{{ url('respuesta') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="respuesta" class="form-label">respuesta</label>
            <input type="text" class="form-control" id="respuesta" name="respuesta" maxlength="255"  required value="{{ old('respuesta') }}">
     <div class="mb-3">
    <label for="esCorrecta" class="form-label">EsCorrecta</label>
    <select class="form-control" id="esCorrecta" name="esCorrecta" required>
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select>
</div>
 <select name="id_pregunta" id="preguntas" class="form-control">
        @foreach($preguntas as $pregunta)
            <option value="{{ $pregunta->id }}">
                {{ $pregunta->pregunta }}
            </option>
        @endforeach
    </select>

   
        <button type="submit" class="btn btn-success">Submit</button>
         <a href="{{ url('respuesta/') }}" class="btn btn-primary">Back</a>
    </form>

@endsection
