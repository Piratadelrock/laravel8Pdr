<?php

namespace App\Http\Controllers;

use App\Models\IPS;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * 
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Pacientes::all();

        return view('pacientes.pacienteIndex', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.pacienteDinamico');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion de campos sin necesidad de validar en front 
        // $request->validate ([
        //     'nombre' => 'required|min:3'
        // ]);

        // $validated = $request->validate([
        //     'nombre' => 'required|string|max:255',
        //     'edad' => 'required|integer',
        // ]);

        //esto es para tomar el id de la ips
        // $ips = IPS::lastest()->first();
        // $ips = IPS::orderBy('id', 'desc')->first();
        // $ultimoId = $ips ? $ips->id : null;

        $paciente = new Pacientes();

        $paciente->nombre = $request->nombre;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->documento_identidad = $request->documento_identidad;
        $paciente->direccion = $request->direccion;
        $paciente->telefono = $request->telefono;
        $paciente->correo_electronico = $request->correo_electronico;
        $paciente->ips_id = 1;
        $paciente->save();

        return redirect()->route('pacientes.index')->with('success', 'Paciente registrado con éxito.');
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
        $PacienteGuardao = Pacientes::find($id);
        if (!$PacienteGuardao) {
            return redirect()->route('pacientes.pacienteDinamico')->with('error', 'ERROR controlador paciente.');
        }

        return view('pacientes.pacienteDinamico', compact('PacienteGuardao'));
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

        $PacienteGuardao = Pacientes::find($id);

        if (!$PacienteGuardao) {
            return redirect()->route('pacientes.index')->with('error', 'ERROR controlador paciente.');
        }

        $PacienteGuardao->nombre = $request->input('nombre');
        $PacienteGuardao->documento_identidad = $request->input('documento_identidad');
        $PacienteGuardao->direccion = $request->input('direccion');
        $PacienteGuardao->telefono = $request->input('telefono');
        $PacienteGuardao->correo_electronico = $request->input('correo_electronico');
        // $PacienteGuardao->ips_id = 1;
        $PacienteGuardao->save();

        return redirect()->route('pacientes.index')->with('success', 'se ha actualizado con exito el paciente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pacientes::destroy($id);
        return redirect()->route('pacientes.index')->with('success', 'se ha eliminado con exito el paciente.');
    }
}
