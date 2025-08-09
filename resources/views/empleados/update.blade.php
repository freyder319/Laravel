@extends('layouts.app')
@section('content')
<div class="container">
    <a class="btn btn-info" href="{{url('/empleados')}}">Regresar</a>
    <form action="{{url('/empleados/'.$empleado->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        @include('empleados.form',['modo'=>'Actualizar'])
    </form>
</div>
@endsection