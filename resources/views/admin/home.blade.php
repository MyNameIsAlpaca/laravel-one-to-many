@extends('layouts.main-layout')

@section('content')

<div class="home-admin">
  <div class="container">
    <h1 class="title">Benvenuto nella tua pagina!</h1>
    <hr>
    <h2 class="pb-3">Sezione progetti</h2>
    <button class="btn btn-primary">
      <a href="{{ route('admin.projects.index') }}">Vai alla pagina di gestione dei progetti</a>
    </button>
    <button class="btn btn-secondary">
      <a href="{{ route('admin.projects.create') }}">Vai al create dei progetti</a>
    </button>
    <hr>
    <h2 class="pb-3">Sezione tipi</h2>

    <button class="btn btn-primary">
      <a href="{{ route('admin.types.index') }}">Vai alla lista dei tipi</a>
    </button>
    <button class="btn btn-secondary">
      <a href="{{ route('admin.types.create') }}">Vai al create dei tipi</a>
    </button>

    


  </div>
</div>

@endsection