@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detallecompra</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <br>
            <br>
            <div class="card">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    
                                    <th>Iddetallecompra</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                    <th>Insumos Idinsumo</th>
                                    <th>Compras Idcompra</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detallecompras as $detallecompra)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $detallecompra->IdDetalleCompra }}</td>
                                        <td>{{ $detallecompra->Cantidad }}</td>
                                        <td>{{ $detallecompra->Precio }}</td>
                                        <td>{{ $detallecompra->Estado }}</td>
                                        <td>{{ $detallecompra->Insumos_IdInsumo }}</td>
                                        <td>{{ $detallecompra->Compras_IdCompra }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $detallecompras->links() !!}
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop