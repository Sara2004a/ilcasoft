<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use App\Models\Proveedore;
use App\Models\Detallecompra;
use App\Models\Insumo;


/**
 * Class CompraController
 * @package App\Http\Controllers
 */
class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::orderBy('IdCompra','DESC')->paginate(10);
        $Proveedores_IdProveedor=Proveedore::all();
        $insumos=Insumo::all();
        return view('compra.index', compact('compras','Proveedores_IdProveedor','insumos'))
            ->with('i', (request()->input('page', 1) - 1) * $compras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function guardar(){
        $campos= request()->validate([
            'Factura'=>'required',
            'Total'=>'required',
            'Fecha'=>'required',
            'Estado'=>'required',
            'Proveedores Idproveedor'=>'required'
        ]);
        Compra::create($campos);
        return redirect('compras') ->with('success', 'Compra creada');
    }
    public function create()
    {
        $compra = new Compra();
        $Proveedores_IdProveedor=Proveedore::all();
        $insumos=Insumo::all();
        return view('compra.create', compact('compra','Proveedores_IdProveedor','insumos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Compra::$rules);

        $compra = Compra::create($request->all());
        return redirect()->route('compras.index')
            ->with('success', 'Compra created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdCompra)
    {
        $compra = Compra::find($IdCompra);

        return view('compra.show', compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdCompra)
    {
        $compra = Compra::find($IdCompra);

        return view('compra.edit', compact('compra'));
    }

    public function eliminar(Compra $proveedore){
        $proveedore->delete();
        return redirect('proveedores')->with('mensaje','Proveedor eliminado');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Compra $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        request()->validate(Compra::$rules);

        $compra->update($request->all());

        return redirect()->route('compras.index')
            ->with('success', 'Compra updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($IdCompra)
    {
        $compra = Compra::find($IdCompra)->delete();

        return redirect()->route('compras.index')
            ->with('success', 'Compra deleted successfully');
    }
}
