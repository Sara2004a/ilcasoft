<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use App\Models\Unidadesmedida;

/**
 * Class InsumoController
 * @package App\Http\Controllers
 */
class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Insumo::orderBy('IdInsumo','DESC')->paginate(10);
        $UnidadesMedida=Unidadesmedida::all();

        return view('insumo.index', compact('insumos','UnidadesMedida'))
            ->with('i', (request()->input('page', 1) - 1) * $insumos->perPage());
    }

    public function guardar(){
        $campos= request()->validate([
            'Nombre'=>'required',
            'Cantidad'=>'required',
            'Precio'=>'required',
            'Estado'=>'required',
            'UnidadesMedida_IdUnidadMedida'=>'required'
        ]);
        Insumo::create($campos);
        return redirect('insumos') ->with('success', 'Insumo creado');
    }

    public function actualizar($insumo){
        $campos= request()->validate([
            'Nombre'=>'required',
            'Cantidad'=>'required',
            'Estado'=>'required|email',
            'UnidadesMedida_IdUnidadMedida'=>'required'
        ]);
        $insumo->update($campos);
        return redirect('insumos')->with('mensaje','Insumo actualizado');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumo = new Insumo();
        $unidadesMedida=Unidadesmedida::all();
        return view('insumo.create', compact('insumo','unidadesMedida'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Insumo::$rules);

        $insumo = Insumo::create($request->all());

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdInsumo)
    {
        $insumo = Insumo::find($IdInsumo);

        return view('insumo.show', compact('insumo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdInsumo)
    {
        $insumo = Insumo::find($IdInsumo);

        return view('insumo.edit', compact('insumo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Insumo $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumo $insumo)
    {
        request()->validate(Insumo::$rules);

        $insumo->update($request->all());

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($IdInsumo)
    {
        $insumo = Insumo::find($IdInsumo)->delete();

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo deleted successfully');
    }
}
