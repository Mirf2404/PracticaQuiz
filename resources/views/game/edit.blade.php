@extends('app.base')

@section('title', 'Edit Game')

@section('content')

    <form action="{{ url('game/'.$game->id) }}" method="post">
        @csrf
        @method('put')

        <!-- Inputs del formulario -->
        <div class="mb-3">
            <label for="title" class="form-label">Pregunta</label>
            <input type="text" class="form-control" id="pregunta" name="pregunta" maxlength="60" required value="{{ old('pregunta', $game->pregunta) }}">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
          <a href="{{ url('game/') }}" class="btn btn-primary">Back</a>
         <a href="{{ url('game/' . $game->id) }}" class="btn btn-primary">View</a>
         
      
    
    </form>         <form class="formDelete" action="{{ url('game/' . $game->id) }}" method="post" style="display: inline-block">
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
