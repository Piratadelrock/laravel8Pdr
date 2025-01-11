<?php

namespace App\Http\Controllers;

use App\Models\Aseguradoras;
use App\Models\IPS;
use App\Models\IPS_Aseguradoras;
use Illuminate\Http\Request;

class IpsAseguradoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ipsaseguradora = IPS_Aseguradoras::all();



        return view('ipsaseguradoras.ipsAseguradoraIndex', compact('ipsaseguradora'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ipsMaestra = IPS::all(['id', 'nombre']);
        $aseguradoraMaestra = Aseguradoras::all(['id', 'nombre']);

        return view('ipsaseguradoras.ipsAseguradoraDinamico', compact('ipsMaestra', 'aseguradoraMaestra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'ips_id' => 'required|exists:ips,id',
        //     'aseguradora_id' => 'required|exists:aseguradoras,id',
        // ]);

        // dd($ips_id, $aseguradora_id);
        // $validatedData = $request->validate([
        //     'ips_id' => 'required|exists:ips,id', // Asegurarse de que ips_id sea válido
        //     'aseguradora_id' => 'required|exists:aseguradoras,id', // Asegurarse de que aseguradora_id sea válido
        // ]);

        $ips_id = $request->input('ips_id');
        $aseguradora_id = $request->input('aseguradora_id');


        // $ipsNombre = Aseguradoras::find($aseguradora_id);

        $relacion = new IPS_Aseguradoras();
        $relacion->ips_id = $ips_id;
        $relacion->aseguradora_id = $aseguradora_id;
        $relacion->save(); // Guardar en la base de datos

        return redirect()->route('ipsaseguradoras.index')->with('success', 'Relación creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ipsMaestra = IPS::all(['id', 'nombre']);
        $aseguradoraMaestra = Aseguradoras::all(['id', 'nombre']);

        return view('ipsaseguradoras.ipsAseguradoraDinamico', compact('ipsMaestra', 'aseguradoraMaestra'));
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
        // Validar los datos
        $validatedData = $request->validate([
            'ips_id' => 'required|exists:ips,id',
            'aseguradora_id' => 'required|exists:aseguradoras,id',
        ]);

        // Encuentra la relación y actualiza los campos
        $relacion = IPS_Aseguradoras::findOrFail($id);
        $relacion->ips_id = $validatedData['ips_id'];
        $relacion->aseguradora_id = $validatedData['aseguradora_id'];
        $relacion->save();

        // Redirige con un mensaje de éxito
        return redirect()->route('ipsaseguradoras.index')->with('success', 'Relación actualizada con éxito.');



        // $relacion = IPS_Aseguradoras::find($id);

        // if (!$relacion) {
        //     return redirect()->route('pacientes.index')->with('error', 'ERROR controlador IPS ASEGURADORA.');
        // }

        // $relacion->ips_id = $request->input('ips_id');
        // $relacion->aseguradora_id = $request->input('aseguradora_id');
        // $relacion->save();

        // return redirect()->route('ipsaseguradoras.index')->with('success', 'Relación actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IPS_Aseguradoras::destroy($id);
        return redirect()->route('ipsaseguradoras.index')->with('success', 'se ha eliminado con exito la relación.');
    }
}
