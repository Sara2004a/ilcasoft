@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
            @includeif('partials.errors')

                
                <div class="card-body">
                    <form method="POST" action="{{ route('compras.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('compra.form')

                    </form>
                </div>
    </div>
</section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
