@extends('layouts.app')

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@section('template_title')
    Create Detallepedido
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Detalle pedido</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detallepedidos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('detallepedido.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
