@extends('layouts.app')

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('template_title')
    {{ $venta->name ?? 'Show Venta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ventas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idventa:</strong>
                            {{ $venta->IdVenta }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $venta->Estado }}
                        </div>
                        <div class="form-group">
                            <strong>Clientes Idcliente:</strong>
                            {{ $venta->Clientes_IdCliente }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
