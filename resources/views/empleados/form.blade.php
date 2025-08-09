<br>Formulario que tendra los datos para crear o actualizar los empleados
<br>
<h1>{{$modo}} Empleados</h1>
<div class="form-group">
<input class="form-control" type="text" value="{{isset($empleado->Nombres)?$empleado->Nombres:old('Nombres')}}" name="Nombres" id="Nombres" placeholder="Introduzca Nombre"><br>
<input class="form-control" type="text" value="{{isset($empleado->PrimerApel)?$empleado->PrimerApel:old('PrimerApel')}}" name="PrimerApel" id="PrimerApel" placeholder="Introduzca Primer Apellido"><br>
<input class="form-control" type="text" value="{{isset($empleado->SegundoApel)?$empleado->SegundoApel:old('SegundoApel')}}" name="SegundoApel" id="SegundoApel" placeholder="Introduzca Segundo Apellido"><br>
<input class="form-control" type="text" value="{{isset($empleado->Correo)?$empleado->Correo:old('Correo')}}" name="Correo" id="Correo" placeholder="Introduzca Email"><br>
<input class="form-control" type="file" name="Foto" required id="Foto"><br>
@if(isset($empleado->Foto))
<img src="{{asset('storage').'/'.$empleado->Foto}}" alt="" width="220" height="220" >
@endif
<br>

<input type="submit" class="btn btn-success" value="{{$modo}} Registro">
</div>
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif