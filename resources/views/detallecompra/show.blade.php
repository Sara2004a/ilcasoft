@extends('layouts.app')

@section('template_title')
    {{ $detallecompra->name ?? 'Show Detallecompra' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detallecompra</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detallecompras.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Iddetallecompra:</strong>
                            {{ $detallecompra->IdDetalleCompra }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $detallecompra->Cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $detallecompra->Precio }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $detallecompra->Estado }}
                        </div>
                        <div class="form-group">
                            <strong>Insumos Idinsumo:</strong>
                            {{ $detallecompra->Insumos_IdInsumo }}
                        </div>
                        <div class="form-group">
                            <strong>Compras Idcompra:</strong>
                            {{ $detallecompra->Compras_IdCompra }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
