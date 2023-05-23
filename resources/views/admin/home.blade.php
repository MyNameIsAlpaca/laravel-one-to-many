@extends('layouts.main-layout')

@section('content')

<div class="home-admin">
  <div class="container">
    <h1>Benvenuto nella tua pagina!</h1>
    <a href="{{ route('admin.projects.index') }}">Vai alla pagina di gestione dei progetti</a>
    <a href="{{ route('admin.projects.create') }}">Vai al create</a>
    


  </div>
</div>

@endsection