<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CocheController extends Controller
{
    //para mostrar todos lo coches
    public function index()
    {
        $coche = Coche::where('idEmpleado', Auth::user()->id)->get();

        return view('paginaCocheUsuario')->with('coches', $coche);
    }

    //para mostrar un coche
    public static function show()
    {
        
    }
    
    //Este método lo renviará al formulario de crear
    public function create(Request $request)
    {
        $idEmpleado = Auth::user()->id;

        return view('crearCocheFormulario', ['idEmpleado' => $idEmpleado]);

    }
    //Recogerá dicho formulario creará un nuevo objeto coche en la base de datos
    public function store(Request $request)
    {
        
        Coche::create([
            'matricula' => $request->matricula,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'idEmpleado' => $request->idEmpleado,
        ]);


        return redirect('/paginaCocheUsuario');
    }

    //Esté método lo renviará al formulario de editar
    public function edit($matricula)
    {
        $cocheModificar = Coche::where('matricula', $matricula)->get();

        return view('modificarCocheFormulario')->with('cocheModificar', $cocheModificar[0]);

    }

    //Actualizará los cambios de dicho objeto en la BDD
    public function update(Request $request)
    {

        
        Coche::where('matricula', $request->matricula)
            ->update([
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'idEmpleado' => $request->idEmpleado,
            ]);
        

        return redirect()->route('paginaCocheUsuario');

    }
    //Eliminará un objeto en la base de datos
    public function destroy($matricula)
    {
        Coche::where('matricula', $matricula)->delete();

        return redirect()->route('paginaCocheUsuario');
    }
}