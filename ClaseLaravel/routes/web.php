<?php

use Illuminate\Support\Facades\Route;
use App\Models\Notas;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('notas', function(){
    //DB::table('notas')->get();
    $notas = Notas::all();
    return view('notas', ['notas' => $notas]);
})->name('notas.index');

Route::get('agregar', function(){
    return view('agregar');
});

Route::get('notas/{id}/editar', function($id){
    //DB::table('notas')->where('id', $id)->first();
    $notas = Notas::find($id);
    
    return view('editar', ['notas' => $notas]);
    //return 'Aqui se van a editar las notas' .$id;
})->name('notas.edit');