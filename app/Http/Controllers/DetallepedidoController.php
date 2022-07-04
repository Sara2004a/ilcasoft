<?php

namespace App\Http\Controllers;

use App\Models\Detallepedido;
use Illuminate\Http\Request;

/**
 * Class DetallepedidoController
 * @package App\Http\Controllers
 */
class DetallepedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallepedidos = Detallepedido::paginate();

        return view('detallepedido.index', compact('detallepedidos'))
            ->with('i', (request()->input('page', 1) - 1) * $detallepedidos->perPage());
    }

    public function actualizar(Detallepedido $detallepedido){
        try {
            $campos = request()->validate([
                'IdDetallePedido'=>'required',
                'Cantidad'=>'required',
                'TotalDetallePedido'=>'required',
                'Pedidos_IdPedido'=>'required',
                'Productos_IdProducto'=>'required',
            ]);
            $detallepedido->update($campos);
            return redirect()->route('detallepedidos.create');
        } catch (\Throwable $th) {
            return $th;
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detallepedido = new Detallepedido();
        return view('detallepedido.create', compact('detallepedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Detallepedido::$rules);

        $detallepedido = Detallepedido::create($request->all());

        return redirect()->route('detallepedidos.index')
            ->with('success', 'Detallepedido created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detallepedido = Detallepedido::find($id);

        return view('detallepedido.show', compact('detallepedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detallepedido = Detallepedido::find($id);

        return view('detallepedido.edit', compact('detallepedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Detallepedido $detallepedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detallepedido $detallepedido)
    {
        request()->validate(Detallepedido::$rules);

        $detallepedido->update($request->all());

        return redirect()->route('detallepedidos.index')
            ->with('success', 'Detallepedido updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detallepedido = Detallepedido::find($id)->delete();

        return redirect()->route('detallepedidos.index')
            ->with('success', 'Detallepedido deleted successfully');

    }

    
}
