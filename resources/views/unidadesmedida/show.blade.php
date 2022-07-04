@extends('layouts.app')

@section('template_title')
    {{ $unidadesmedida->name ?? 'Show Unidadesmedida' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Unidadesmedida</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('unidadesmedidas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idunidadmedida:</strong>
                            {{ $unidadesmedida->IdUnidadMedida }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $unidadesmedida->Descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
