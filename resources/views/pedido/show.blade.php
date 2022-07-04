@extends('layouts.app')

@section('template_title')
    {{ $pedido->name ?? 'Show Pedido' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pedidos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idpedido:</strong>
                            {{ $pedido->IdPedido }}
                        </div>
                        <div class="form-group">
                            <strong>Fechapedido:</strong>
                            {{ $pedido->FechaPedido }}
                        </div>
                        <div class="form-group">
                            <strong>Totalpedido:</strong>
                            {{ $pedido->TotalPedido }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $pedido->Estado }}
                        </div>
                        <div class="form-group">
                            <strong>Clientes Idcliente:</strong>
                            {{ $pedido->Clientes_IdCliente }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
