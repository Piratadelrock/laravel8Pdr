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
        $pacientes = Pacientes::with('ips')->get();

        return view('pacientes.pacienteIndex', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ipsMaestra = IPS::all();
        return view('pacientes.pacienteDinamico', compact('ipsMaestra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $paciente = new Pacientes();

        $paciente->nombre = $request->nombre;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->documento_identidad = $request->documento_identidad;
        $paciente->direccion = $request->direccion;
        $paciente->telefono = $request->telefono;
        $paciente->correo_electronico = $request->correo_electronico;
        $paciente->ips_id = $request->ips_id;
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
        $ipsMaestra = IPS::all(['id', 'nombre']);
        return view('pacientes.pacienteDinamico', compact('PacienteGuardao', 'ipsMaestra'));
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
        $PacienteGuardao->ips_id = $request->ips_id;
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
