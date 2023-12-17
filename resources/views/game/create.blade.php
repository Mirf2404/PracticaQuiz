@extends('app.base')
@section('title', 'Argo Create Game')
@section('content')
    <h2>Create pregunta</h2>

    <form action="{{ url('game') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="pregunta" class="form-label">pregunta</label>
            <input type="text" class="form-control" id="pregunta" name="pregunta" maxlength="255"  required value="{{ old('pregunta') }}">
        </div>

   
        <button type="submit" class="btn btn-success">Submit</button>
         <a href="{{ url('game/') }}" class="btn btn-primary">Back</a>
    </form>

@endsection
