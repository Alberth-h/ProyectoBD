<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notas;

class NotasController extends Controller
{
    public function index(){
        //DB::table('notas')->get();
        $notas = Notas::all();
        return view('notas', ['notas' => $notas]);
    }

    public function agregar(){
        return view('agregar');
    }

    public function crear(Request $request){
        Notas::create([
            'titulo' => $request->input('title'),
            'contenido' => $request->input('content'),
        ]);
    
        return redirect('/notas');
    }

    public function editar ($id){
        //DB::table('notas')->where('id', $id)->first();
        $notas = Notas::find($id);
        
        return view('editar', ['notas' => $notas]);
        //return 'Aqui se van a editar las notas' .$id;
    }
}
