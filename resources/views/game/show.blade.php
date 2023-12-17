@extends('app.base')

@section('title', 'Argo Movie')

@section('content')
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <tbody>
            <tr>
                <td>#</td>
                <td>{{ $game->id }}</td>
            </tr>
            <tr>
                <td>Title</td>
                <td>{{ $game->pregunta }}</td>
            </tr>
           
        </tbody>
    </table>
    <a href="{{ url('game/' . $game->id . '/edit')}}" class="btn btn-success"><i class="fa fa-magic"></i>Edit</a> 
     <a href="{{ url('game/') }}" class="btn btn-primary">Back</a>
     <form class="formDelete" action="{{ url('game/' . $game->id) }}" method="post" style="display: inline-block">
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
</div>
@endsection