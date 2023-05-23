@extends('layouts/main-layout')

@section('content')

<div class="admin-type-section">
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Name</th>
          <th scope="col">Descrizione</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($types as $type)
        <tr>
          <th scope="row">{{$type->id}}</th>
          <td>{{$type->name}}</td>
          <td>{{$type->desc}}</td>
          <td><i class="fa-solid fa-trash"></i></td>
          <td><i class="fa-solid fa-pen-to-square"></i></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection
