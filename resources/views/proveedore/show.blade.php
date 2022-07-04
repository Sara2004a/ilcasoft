@extends('layouts.app')

@section('template_title')
    {{ $proveedore->name ?? 'Show Proveedore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Proveedore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proveedores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idproveedor:</strong>
                            {{ $proveedore->IdProveedor }}
                        </div>
                        <div class="form-group">
                            <strong>Nombreempresa:</strong>
                            {{ $proveedore->NombreEmpresa }}
                        </div>
                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $proveedore->Nit }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $proveedore->Email }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proveedore->Nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
