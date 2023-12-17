@extends('app.base')
@section('title', 'Argo Create Game') <!-- Cambiar 'Movie' por 'Game' -->
@section('content')
<div class="card">
 <div class="card-header">
 <strong class="card-title">Custom Table</strong>
 </div>
 <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                <th scope="col">#</th>
                <th scope="col">Pregunta</th>
            
                   <th scope="col"></th>
            </tr>
                                    </thead>
                                    <tbody>
                                         
            @foreach($games as $game) <!-- Cambiar 'movies' por 'games' -->
                <tr>
                    <td>{{ $game->id }} </td>
                    <td>{{ $game->pregunta }}</td>
           
                    <td>
                        <a href="{{ url('game/' . $game->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ url('game/' . $game->id . '/edit')}}" class="btn btn-success"><i class="fa fa-magic"></i>Edit</a> 
        <form class="formDelete" action="{{ url('game/' . $game->id) }}" method="post" style="display: inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn-danger btn" type="submit" >Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
</tbody>
</table>
             <a class="btn-primary btn" href="{{ url('game/create') }}"><i class="fa fa-plus"></i>Link to create</a>
               <a href="{{ url('Admin/') }}" class="btn btn-primary">Back</a>
            
                            </div> <!-- /.table-stats -->
                        </div>
                <script>
    const forms = document.querySelectorAll(".formDelete");
    forms.forEach(function(form){
        form.onsubmit = () => {
            return confirm("Seguro?");
        }
    });
    
    
</script>        
                        
                        
            
@endsection
