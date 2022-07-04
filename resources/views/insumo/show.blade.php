@extends('layouts.app')

@section('template_title')
    {{ $insumo->name ?? 'Show Insumo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Insumo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('insumos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idinsumo:</strong>
                            {{ $insumo->IdInsumo }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $insumo->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $insumo->Cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $insumo->Estado }}
                        </div>
                        <div class="form-group">
                            <strong>Unidadesmedida Idunidadmedida:</strong>
                            {{ $insumo->UnidadesMedida_IdUnidadMedida }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
