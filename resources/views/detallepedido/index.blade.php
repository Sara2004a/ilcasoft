@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalle de pedido</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style position:absolute="display: flex; justify-content: space-between; align-items: center;">

                            <span IdPedido="card_title">
                                {{ __('Detallepedido') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('detallepedidos.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif



                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>COG</th>
                                        <th>Productos</th>
                                        <th>Cantidad</th>
                                        <th>Total detalle pedido</th>
                                        <th>Pedidos Idpedido</th>
                                        <th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($detallepedidos as $detallepedido)
                                        <tr>
                                            <td>{{ $detallepedido->IdDetallePedido }}</td>
                                            <td>{{ $detallepedido->Productos_IdProducto }}</td>
                                            <td>{{ $detallepedido->Cantidad }}</td>
                                            <td>{{ $detallepedido->TotalDetallePedido }}</td>
                                            <td>{{ $detallepedido->Pedidos_IdPedido }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('detallepedidos.destroy', $detallepedido->IdPedido) }}"
                                                    method="POST">
                                                    <a type="button" class="btn btn-sm btn-success"
                                                        data-toggle="modal"
                                                        data-target="#editarDetallePedido{{ $detallepedido->IdDetallePedido }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade-position-absolute"
                                        

                                            id="editarDetallePedido{{ $detallepedido->IdDetallePedido }}" tabindex="-1"
                                            role="dialog" aria-labelledby="crearPedidosModal" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Detalle de pedido</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('actualizardetallepedido',$detallepedido)}}" method="post">
                                                            @csrf @method('PUT')
                                                            
                                                            <div class="form-group">
                                                                <label for="nombre">Productos</label>
                                                                <input type="text" class="form-control"
                                                                    name="Productos_IdProducto" id="Productos_IdProducto"
                                                                    placeholder="Ingrese el producto"
                                                                    value="{{ old('Productos_IdProducto',$detallepedido->Productos_IdProducto) }}">
                                                                <small
                                                                    class="text-danger">{{ $errors->first('Productos_IdProducto') }}</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nombre">Cantidad</label>
                                                                <input type="text" class="form-control"
                                                                    name="Cantidad" id="Cantidad"
                                                                    placeholder="Ingrese la cantidad"
                                                                    value="{{ old('Cantidad',$detallepedido->Cantidad) }}">
                                                                <small
                                                                    class="text-danger">{{ $errors->first('Cantidad') }}</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nombre">Total detalle pedido</label>
                                                                <input type="text" class="form-control"
                                                                    name="TotalDetallePedido" id="TotalDetallePedido"
                                                                    placeholder="Ingrese el total"
                                                                    value="{{ old('TotalDetallePedido',$detallepedido->TotalDetallePedido) }}">
                                                                <small
                                                                    class="text-danger">{{ $errors->first('TotalDetallePedido') }}</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nombre">Pedidos Idpedido</label>
                                                                <input type="text" class="form-control"
                                                                    name="Pedidos_IdPedido" id="Pedidos_IdPedido"
                                                                    placeholder="Ingrese el pedido"
                                                                    value="{{ old('Pedidos_IdPedido',$detallepedido->Pedidos_IdPedido) }}">
                                                                <small
                                                                    class="text-danger">{{ $errors->first('Pedidos_IdPedido') }}</small>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="IdDetallePedido" id="IdDetallePedido" value="{{$detallepedido->IdDetallePedido}}">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    Guardar</button>
                                                        </form>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                    @empty
                                        <tr>
                                            Sin resultados
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $detallepedidos->links() !!}
            </div>
        </div>
    </div>
@endsection
