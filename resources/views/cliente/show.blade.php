@extends('layouts.app')
@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')

@section('template_title')
    {{ $cliente->name ?? 'Show Cliente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idcliente:</strong>
                            {{ $cliente->IdCliente }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $cliente->Apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $cliente->Cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $cliente->Telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $cliente->Direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $cliente->Email }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $cliente->Estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
