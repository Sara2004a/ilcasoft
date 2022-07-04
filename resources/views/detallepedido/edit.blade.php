@extends('layouts.app')

@section('template_title')
    Update Detallepedido
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Detallepedido</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detallepedidos.update', $detallepedido->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('detallepedido.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
