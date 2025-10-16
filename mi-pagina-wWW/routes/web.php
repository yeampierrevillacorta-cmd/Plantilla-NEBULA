<?php
use Illuminate\Support\Facades\Route;

// Ruta principal - Introducción cinematográfica
Route::get('/', function () {
    return view('intro');
});

// Ruta de presentación principal
Route::get('/presentacion', function () {
    $datos = [
        'nombre' => 'NEBULA',
        'profesion' => 'Web3 Blockchain Specialist',
        'sobre_mi' => 'Especialista en tecnologías Web3, blockchain y desarrollo de aplicaciones descentralizadas. Con más de una década explorando el ecosistema cripto, creando soluciones que revolucionan la interacción digital y conectan el mundo físico con el metaverso.',
        'contacto' => 'Puedes contactarme a través de mi email: tu@email.com'
    ];
    return view('presentacion', $datos);
});

// Ruta alternativa para la introducción
Route::get('/intro', function () {
    return view('intro');
});

// Ruta para la página tecnológica
Route::get('/tech', function () {
    return view('tech');
});