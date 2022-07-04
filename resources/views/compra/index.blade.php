@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Compras</h1>
@stop

@section('content')
{{--  <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearComprasModal">
        <i class="fas fa-user-plus"></i> Crear nuevo </i>
    </button>  --}}

    {{--  <!-- Modal -->
    <div class="modal fade" id="crearComprasModal" tabindex="-1" role="dialog"
        aria-labelledby="crearComprasModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva compra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    @csrf
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    @endif
                    <form action="{{ route('comprasGuardar') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Numero de factura</label>
                            <input type="text" class="form-control" name="Factura" id="Factura"
                                placeholder="Ingrese numero factura" value="{{ old('Factura') }}">
                            <small class="text-danger">{{ $errors->first('Factura') }}</small>
                        </div>
                    <div class="form-group">
                        <label for="nombre">Total</label>
                        <input type="text" class="form-control" name="Total" id="Total" placeholder="Ingrese el total"
                            value="{{ old('Total') }}">
                        <small class="text-danger">{{ $errors->first('Total') }}</small>
                    </div>

                    <div class="form-group">
                        <label for="nombre">Fecha</label>
                        <input type="date" class="form-control" name="Fecha" id="Fecha" placeholder="Ingrese la fecha" value="{{ old('Fecha') }}">
                        <small class="text-danger">{{ $errors->first('Fecha') }}</small>
                    </div>

                    <div class="form-group">
                        <label for="nombre">Estado</label>
                        <input type="text" class="form-control" name="Estado" id="Estado"
                            placeholder="Ingrese el Estado" value="{{ old('Estado') }}">
                        <small class="text-danger">{{ $errors->first('Estado') }}</small>
                    </div>

                    <div>
                        <label for="">Proveedor</label>
                        <select name="Proveedores_IdProveedor" id="Proveedores_IdProveedor" class="form-control">
                            @foreach($Proveedores_IdProveedor as $Proveedores_IdProveedores)
                            <option value="{{$Proveedores_IdProveedores['IdProveedor']}}">{{$Proveedores_IdProveedores['NombreEmpresa']}}</option>
                            @endforeach
            
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
            </div>
        </div>
    </div>
    </div>  --}}



    <div class="container-fluid">
        <div class="align-left">
                            <a href="{{ route('compras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Create New') }}
                            </a>
                          </div>
                    </div>
                </div>
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
                                    
                                    <th>Idcompra</th>
                                    <th>Factura</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Proveedores Idproveedor</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compras as $compra)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $compra->IdCompra }}</td>
                                        <td>{{ $compra->Factura }}</td>
                                        <td>{{ $compra->Total }}</td>
                                        <td>{{ $compra->Fecha }}</td>
                                        <td>{{ $compra->Estado }}</td>
                                        <td>{{ $compra->Proveedores_IdProveedor }}</td>

                                        <td>
                                            <form action="{{ route('compras.destroy',$compra->IdCompra) }}" method="POST">
                                                {{--  <a class="btn btn-sm btn-primary " href="{{ route('compras.show',$compra->IdCompra) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                <a class="btn btn-sm btn-success" href="{{ route('compras.edit',$compra->IdCompra) }}"><i class="fa fa-fw fa-edit"></i></a>  --}}

                                                <a class="btn btn-sm btn-primary "
                                        href="#mostrarCompras{{ $compra->IdCompra }}" data-toggle="modal"
                                        data-target="#mostrarCompras{{ $compra->IdCompra }}"><i
                                            class="fa fa-fw fa-eye"></i></a>

                                    <a class="btn btn-sm btn-success" href="#editarCompras{{ $compra->IdCompra }}" data-toggle="modal"
                                        data-target="#editarCompras{{ $compra->IdCompra }}"><i class="fa fa-fw fa-edit"></i></a>

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal Vista compras-->
                        <div class="modal fade" id="mostrarCompras{{ $compra->IdCompra }}" tabindex="-1"
                            role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detalles de la compra: {{$compra->Factura}}</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <h5> <strong>Factura: </strong> {{ $compra->Factura }}</h5>
                                        <h5> <strong>Total: </strong> {{ $compra->Total }}</h5>
                                        <h5> <strong>Fecha: </strong> {{ $compra->Fecha }}</h5>
                                        <h5> <strong>Estado: </strong> {{ $compra->Estado }}</h5>
                                        <h5> <strong>IdProveedor: </strong> {{ $compra->Proveedores_IdProveedor}}</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal editar compras-->
                        <div class="modal fade" id="editarCompras{{ $compra->IdCompra }}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarComprasLabel">Editar Proveedor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    @csrf @method('PUT')
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    @endif
                    
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nombre">Numero de factura</label>
                                            <input type="text" class="form-control" name="Factura" id="Factura"
                                                placeholder="Ingrese numero factura" value="{{ old('Factura') }}">
                                            <small class="text-danger">{{ $errors->first('Factura') }}</small>
                                        </div>
                                    <div class="form-group">
                                        <label for="nombre">Total</label>
                                        <input type="text" class="form-control" name="Total" id="Total" 
                                        placeholder="Ingrese el total"
                                            value="{{ old('Total') }}">
                                        <small class="text-danger">{{ $errors->first('Total') }}</small>
                                    </div>
                
                                        <div class="form-group">
                                            <label for="nombre">Fecha</label>
                                            <input type="date" class="form-control" name="Fecha" id="Fecha"
                                             placeholder="Ingrese la fecha" value="{{ old('Fecha') }}">
                                            <small class="text-danger">{{ $errors->first('Fecha') }}</small>
                                        </div>

        
                                        <div class="form-group">
                                            <label for="nombre">Estado</label>
                                            <input type="text" class="form-control" name="Estado" id="Estado"
                                                placeholder="Ingrese el Estado" value="{{ old('Estado') }}">
                                            <small class="text-danger">{{ $errors->first('Estado') }}</small>
                                        </div>
                                    <div>
                                        <label for="">Proveedor</label>
                                        <select name="Proveedores_IdProveedor" id="Proveedores_IdProveedor" class="form-control">
                                            @foreach($Proveedores_IdProveedor as $Proveedores_IdProveedores)
                                            <option value="{{$Proveedores_IdProveedores['IdProveedor']}}">{{$Proveedores_IdProveedores['NombreEmpresa']}}</option>
                                            @endforeach
                            
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $compras->links() !!}
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
