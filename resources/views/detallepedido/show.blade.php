@extends('layouts.app')

@section('template_title')
    {{ $detallepedido->name ?? 'Show Detallepedido' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detallepedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detallepedidos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Iddetallepedido:</strong>
                            {{ $detallepedido->IdDetallePedido }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $detallepedido->Cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Totaldetallepedido:</strong>
                            {{ $detallepedido->TotalDetallePedido }}
                        </div>
                        <div class="form-group">
                            <strong>Pedidos Idpedido:</strong>
                            {{ $detallepedido->Pedidos_IdPedido }}
                        </div>
                        <div class="form-group">
                            <strong>Productos Idproducto:</strong>
                            {{ $detallepedido->Productos_IdProducto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
