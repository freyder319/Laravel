@extends('layouts.app')
@section('content')
<div class="container">
@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('mensaje')}}
    </div>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <a href="{{url('/empleados/create')}}" class="btn btn-success">Registrar Nuevo Empleado</a>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>P. Apellido</th>
                <th>S. Apellido</th>
                <th>Correo</th>
                <th>Accion</th>
            </tr>
        </thead>
            <tbody>
        @foreach($empleados as $datos)
        <tr>
            <td>{{$datos->id}}</td>
            <td><img width="100px" src="{{asset('storage').'/'.$datos->Foto}}" alt=""></td>
            <td>{{$datos->Nombres}}</td>
            <td>{{$datos->PrimerApel}}</td>
            <td>{{$datos->SegundoApel}}</td>
            <td>{{$datos->Correo}}</td>
            <td><a href="{{url('/empleados/'.$datos->id.'/edit')}}" class="btn btn-warning">Editar </a> | 
                <form action="{{url('/empleados/'.$datos->id)}}" method="POST">
                    @csrf
                    {{method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas Eliminar?')" value="Eliminar">
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {!! $empleados->links() !!}
    </div>
    @endsection


</body>
</html>