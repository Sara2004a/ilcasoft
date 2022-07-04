@extends('layouts.app')

@section('template_title')
    {{ $compra->name ?? 'Show Compra' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Compra</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('compras.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idcompra:</strong>
                            {{ $compra->IdCompra }}
                        </div>
                        <div class="form-group">
                            <strong>Factura:</strong>
                            {{ $compra->Factura }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $compra->Total }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $compra->Fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $compra->Estado }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedores Idproveedor:</strong>
                            {{ $compra->Proveedores_IdProveedor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
