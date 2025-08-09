@extends('layouts.app')
@section('content')
<div class="container">
    <a class="btn btn-info" href="{{url('/empleados')}}">Regresar</a>
    <h2>FORMULARIO PARA CREAR EMPLEADOS</h2>
    <form action="{{url('/empleados')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('empleados.form',['modo'=>'Guardar'])
    </form>
</div>
@endsection