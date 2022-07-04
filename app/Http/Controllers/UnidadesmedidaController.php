<?php

namespace App\Http\Controllers;

use App\Models\Unidadesmedida;
use Illuminate\Http\Request;

/**
 * Class UnidadesmedidaController
 * @package App\Http\Controllers
 */
class UnidadesmedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidadesmedidas = Unidadesmedida::paginate();

        return view('unidadesmedida.index', compact('unidadesmedidas'))
            ->with('i', (request()->input('page', 1) - 1) * $unidadesmedidas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidadesmedida = new Unidadesmedida();
        return view('unidadesmedida.create', compact('unidadesmedida'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Unidadesmedida::$rules);

        $unidadesmedida = Unidadesmedida::create($request->all());

        return redirect()->route('unidadesmedidas.index')
            ->with('success', 'Unidadesmedida created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unidadesmedida = Unidadesmedida::find($id);

        return view('unidadesmedida.show', compact('unidadesmedida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidadesmedida = Unidadesmedida::find($id);

        return view('unidadesmedida.edit', compact('unidadesmedida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Unidadesmedida $unidadesmedida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidadesmedida $unidadesmedida)
    {
        request()->validate(Unidadesmedida::$rules);

        $unidadesmedida->update($request->all());

        return redirect()->route('unidadesmedidas.index')
            ->with('success', 'Unidadesmedida updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $unidadesmedida = Unidadesmedida::find($id)->delete();

        return redirect()->route('unidadesmedidas.index')
            ->with('success', 'Unidadesmedida deleted successfully');
    }
}
