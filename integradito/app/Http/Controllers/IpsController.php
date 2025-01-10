<?php

namespace App\Http\Controllers;

use App\Models\IPS;
use Illuminate\Http\Request;

class IpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ips = IPS::all();
        return view('ips.ipsindex', compact('ips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $ipsGuardado = IPS::find($id);
        if (!$ipsGuardado) {
            return redirect()->route('ips.ipsDinamico')->with('error', 'ERROR controlador ips.');
        }
        return view('ips.ipsDinamico', compact('ipsGuardado'));
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
        $ipsGuardado = IPS::find($id);
        if (!$ipsGuardado) {
            return redirect()->route('ips.index')->with('error', 'ERROR controlador ips.');
        }
        $ipsGuardado->nombre = $request->input('nombre');
        $ipsGuardado->save();
        return redirect()->route('ips.index')->with('success', 'se ha actualizado con exito la ips.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
