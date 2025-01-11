<?php

namespace App\Http\Controllers;

use App\Models\Aseguradoras;
use Illuminate\Http\Request;

class AseguradoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aseguradoras = Aseguradoras::all();
        return view('aseguradoras.aseguradoraIndex', compact('aseguradoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('aseguradoras.aseguradoraDinamico');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aseguradoras = new Aseguradoras();
        $aseguradoras->nombre = $request->nombre;
        $aseguradoras->save();
        return redirect()->route('aseguradoras.index')->with('success', 'Aseguradora registrada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aseguradoraGuardada = Aseguradoras::find($id);
        if (!$aseguradoraGuardada) {
            return redirect()->route('aseguradoras.aseguradoraDinamico')->with('error', 'ERROR controlador update aseguradora.');
        }
        return view('aseguradoras.aseguradoraDinamico', compact('aseguradoraGuardada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aseguradoraGuardada = Aseguradoras::find($id);
        if (!$aseguradoraGuardada) {
            return redirect()->route('aseguradoras.aseguradoraDinamico')->with('error', 'ERROR controlador update aseguradora.');
        }
        $aseguradoraGuardada->nombre = $request->input('nombre');
        $aseguradoraGuardada->save();
        return redirect()->route('aseguradoras.index')->with('success', 'se ha actualizado con exito la Aseguradora.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aseguradoras::destroy($id);
        return redirect()->route('aseguradoras.index')->with('success', 'Se ha eliminado con exito.');
    }
}
