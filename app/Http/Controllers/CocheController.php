<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    public function formularioCrear(Request $request){
        $idEmpleado = Auth::user()->id;

        return view('crearCocheFormulario', ['idEmpleado' => $idEmpleado]);
    }
    public function create()
    {
        

       

        //return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $matricula = $request->input('matricula');
        $marca=$request->input('marca');
        $modelo=$request->input('modelo');
        $idEmpleado = Auth::user()->id;

        $coche = new Coche();
        $coche->matricula = $matricula;
        $coche->marca = $marca;
        $coche->modelo = $modelo;
        $coche->idEmpleado = $idEmpleado;
        
        $coche->save();

        /*$coche = Coche::create([
            'matricula' => $request->matricula,
            '' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return DB::table('coches')->insert([
            'matricula' => '',
            'campo2' => 'valor2',
            'idEmpleado' => Auth::user()->id,
            
        ]);*/

        return redirect('/paginaCocheUsuario');
    }

    /**
     * Display the specified resource.
     */
    public static function show()
    {

        $coche= DB::select('SELECT * FROM coches WHERE idEmpleado = ?', [Auth::user()->id]);

        return view('paginaCocheUsuario')->with('coches', $coche);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($matricula)
    {
        $cocheModificar = DB::select('SELECT * FROM coches WHERE matricula = ?', [$matricula]);

        return view('modificarCocheFormulario')->with('cocheModificar', $cocheModificar[0]);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($cocheModificar)
    {
        DB::update('UPDATE FROM coches WHERE matricula = ?', [$cocheModificar->matricula]);

        return  redirect()->route('paginaCocheUsuario');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($matricula)
    {

        DB::delete('DELETE FROM coches WHERE matricula = ?', [$matricula]);

        return  redirect()->route('paginaCocheUsuario');
    }
}
