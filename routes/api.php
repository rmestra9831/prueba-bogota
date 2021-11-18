<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/array', function () {
    $usuarios = array(
        array('nombre' => 'Alex',   'apellido' => 'Escobar',    'telefono' => '3213211212'),
        array('nombre' => 'Juan',   'apellido' => 'Gomez',      'telefono' => '3213211212'),
        array('nombre' => 'Andres', 'apellido' => 'Marín',      'telefono' => '3213211212'),
        array('nombre' => 'Angie',  'apellido' => 'Rivera',     'telefono' => '3213211212'),
    );

    foreach ($usuarios as $usuario) {
        echo $usuario['nombre'].' '.$usuario['apellido'].' '.$usuario['telefono'];
    }
});

// Route::post('/login', [AuthController::class, 'login'])->middleware('verifiedEmail');

// Route::get('/verificacion', function () {
//     return 'pagina de verificación';
// });