@extends('app.base')
@section('title', 'Argo Create Game') <!-- Cambiar 'Movie' por 'Game' -->
@section('content')


                        <a href="{{ url('respuesta/') }}" class="btn btn-primary">Respuestas</a>
                        <a href="{{ url('game/')}}" class="btn btn-success"><i class="fa fa-magic"></i>Preguntas</a> 
      <a href="./Client" class="btn-danger btn">Client</a>
@endsection
