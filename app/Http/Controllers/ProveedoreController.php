<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Http\Request;

/**
 * Class ProveedoreController
 * @package App\Http\Controllers
 */
class ProveedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedore::orderBy('IdProveedor','DESC')->paginate(10);

        return view('proveedore.index', compact('proveedores'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedores->perPage());
    }

    public function guardar(){
        $campos= request()->validate([
            'NombreEmpresa'=>'required',
            'Nit'=>'required',
            'Email'=>'required|email',
            'Nombre'=>'required'
        ]);
        Proveedore::create($campos);
        return redirect('proveedores') ->with('success', 'Proveedor creado');
    }

    public function actualizar(Proveedore $proveedor){
        $campos= request()->validate([
            'NombreEmpresa'=>'required',
            'Nit'=>'required',
            'Email'=>'required|email',
            'Nombre'=>'required'
        ]);
        $proveedor->update($campos);
        return redirect('proveedores')->with('mensaje','Proveedor actualizado');
    }

    public function eliminar(Proveedore $proveedore){
        $proveedore->delete();
        return redirect('proveedores')->with('mensaje','Proveedor eliminado');
    }

 


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedore = new Proveedore();
        return view('proveedore.create', compact('proveedore'));
    }


 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Proveedore::$rules);

        $proveedore = Proveedore::create($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdProveedor)
    {
        $proveedore = Proveedore::find($IdProveedor);

        return view('proveedore.show', compact('proveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdProveedor)
    {
        $proveedore = Proveedore::find($IdProveedor);

        return view('proveedore.edit', compact('proveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proveedore $proveedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedore $proveedore)
    {
        request()->validate(Proveedore::$rules);

        $proveedore->update($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($IdProveedor)
    {
        $proveedore = Proveedore::find($IdProveedor)->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore deleted successfully');
    }
}

