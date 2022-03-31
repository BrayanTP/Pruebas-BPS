<?php

namespace App\Http\Controllers;

use App\Models\contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['contacto']=contacto::paginate(8);
        return view('contacto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nombres'=>'required|string|max:40',
            'apellidos'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'departamento'=>'required|string|max:100',
            'ciudad'=>'required|string|max:100',
            'telefono'=>'required|numeric',
            
        ];
        $this->validate($request, $campos);
        $datosContacto=request()->except('_token');

        contacto::insert($datosContacto);
        return redirect('contacto/')->with('msn','El contacto se ha registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto=contacto::findOrFail($id);
        return view('contacto.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombres'=>'required|string|max:40',
            'apellidos'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'departamento'=>'required|string|max:100',
            'ciudad'=>'required|string|max:100',
            'telefono'=>'required|numeric',
            
        ];
        $this->validate($request, $campos);
        $datosContacto=request()->except(['_token', '_method']);

        contacto::where('id','=',$id)->update($datosContacto);

        $contacto=contacto::findOrFail($id);
        $datos['contacto']=contacto::paginate(8);
        return redirect('contacto/')->with('msn2','El contacto se ha actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        contacto::destroy($id);
        return redirect('contacto/')->with('msn1','El contacto se ha eliminado con éxito');
    }
}
