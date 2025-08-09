<?php
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/empleados', function () {
//     return view('empleados.index');
// });

// Route::get('empleados/create',[EmpleadoController::class,'create']) ;

Route::resource('empleados', EmpleadoController::class)->middleware('auth');

Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/',[EmpleadoController::class,'index'])->name('home');
});