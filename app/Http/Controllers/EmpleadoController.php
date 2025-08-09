<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class EmpleadoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listado['empleados']= empleado::paginate(2);
        return view('empleados.index', $listado);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validacion de los campos al crear un registro
        $validacion = [
            'Nombres' => 'required|string|max:100',
            'PrimerApel' => 'required|string|max:100',
            'SegundoApel' => 'required|string|max:100',
            'Correo' => 'required|string|max:255',
            'Foto' => 'required',
        ];
        $msj=[
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La Foto es requerida',

        ];
        $this-> validate($request,$validacion,$msj);
        // $datosEmpleado = request ()-> all();
        $datosEmpleado=request ()->except('_token');
        if($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        empleado::insert($datosEmpleado);
        // return response()->json($datosEmpleado);
        return redirect('empleados')->with('mensaje','Registro ingresado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado= empleado::findOrFail($id);
        return view('empleados.update', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validacion = [
            'Nombres' => 'required|string|max:100',
            'PrimerApel' => 'required|string|max:100',
            'SegundoApel' => 'required|string|max:100',
            'Correo' => 'required|string|max:255',
            'Foto' => 'required',
        ];
        $msj=[
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La Foto es requerida',

        ];
        if($request->hasFile('Foto')){
            $validacion= ['Foto'=>'required|max:10000|mimes:jpg,png,jpeg'];
            $msj=['Foto.required'=>'La foto es requerida'];
        }
        $this-> validate($request,$validacion,$msj);
        $datos= request()->except(['_token','_method']);
        if($request->hasFile('Foto')){
            $datos['Foto']=$request->file('Foto')->store('uploads','public');
        }
        empleado::where('id','=',$id)->update($datos);
        $empleado = empleado::findOrFail($id);
        // cuando se edite enviamos un mensaje y redireccionamos al index
        return redirect('empleados')->with('mensaje','Registro guardado con cambios exitosamente');
        // return view('empleados.update',compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = empleado::findOrFail($id);
        if(Storage::delete('public/'.$empleado->Foto)){
            empleado::destroy($id);
        }
        // return redirect('empleados');
        return redirect('empleados')->with('mensaje','Registro eliminado exitosamente');
    }
}
