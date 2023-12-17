        @extends('app.base')

@section('title', 'Argo Setting')

@section('content')

<form action="{{ url('setting') }}" method="post">
    
    @method('put')    
    @csrf
    
    <div>
        Behaviour after inserting new movie
    </div>
    
    <input class="form-check-input" type="radio" id="showgames" name="afterInsert" 
        value="show games" @if(session('afterInsert', 'show games') == 'show games') checked @endif/>
    <label class="form-check-label" for="showgames">
        Show all movies list
    </label>
    <br>
    <input class="form-check-input" type="radio" id="creategames" name="afterInsert" 
        value="show create form" @if(session('afterInsert', 'show games') == 'show create form') checked @endif/>
    <label class="form-check-label" for="creategames">
        Show create movies form
    </label>
    
    <br><br>
    
    <!--
    <input class="form-check-input" type="radio" id="showMovie2" name="create" value="show movies2" {{ $checkedList }}/>
    <label class="form-check-label" for="showMovie2">
        Show all movies list
    </label>
    <br>
    <input class="form-check-input" type="radio" id="createMovie2" name="create" value="show create form2" {{ $checkedCreate }}/>
    <label class="form-check-label" for="createMovie2">
        Show create movies form
    </label>
    
    <br><br>
    -->
    
   
    <label for="editgames">Behaviour after inserting new game</label>
    <select name="editgames" id="editgames" class="form-select" aria-label="Default select example">
        <option selected hidden>Select</option>
        <option value="showallgames" @if(session('Edit', 'show games edit') == 'show games edit') checked @endif>Show all games list</option>
        <option value="showeditgameform" @if(session('Edit', 'show edit') == 'show edit') checked @endif>Show Edit game form</option>
    </select>
    <button type="submit" class="btn btn-primary">Save setting</button>
</form>
@endSection

