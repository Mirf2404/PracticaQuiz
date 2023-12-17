@extends('app.base')
@section('title', 'Argo Create Game') <!-- Cambiar 'Movie' por 'Game' -->
@section('content')

<!-- resources/views/alias/form.blade.php -->
<form action="{{ route('client.saveAlias') }}" method="post">
    @csrf
    <label for="alias">Alias:</label>
    <input type="text" name="alias" id="alias" required>
    <button class="btn btn-primary" type="submit">Guardar Alias</button>
</form>

@if(session('message'))
    <p>{{ session('message') }}</p>
@endif
 
@if(session('alias'))
    <p>El alias almacenado en la sesión es: {{ session('alias') }}</p>
@else
    <p>No hay alias almacenado en la sesión.</p>
@endif

@endsection
