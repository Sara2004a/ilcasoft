@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proveedores</h1>
@stop

@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearProveedoresModal">
        <i class="fas fa-user-plus"></i> Crear nuevo </i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="crearProveedoresModal" tabindex="-1" role="dialog"
        aria-labelledby="crearProveedoresModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo proveedor</h5>
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
                    <form action="{{ route('proveedoresGuardar') }}" method="POST">
                        @csrf

                        
                            <div class="form-group">
                                <label for="nombre">Nombre de la empresa</label>
                                <input type="text" class="form-control" name="NombreEmpresa" id="NombreEmpresa"
                                    placeholder="Ingrese nombre de la empresa" value="{{ old('NombreEmpresa') }}">
                                <small class="text-danger">{{ $errors->first('NombreEmpresa') }}</small>
                            </div>
                        

                        <div class="form-group">
                            <label for="nombre">Nit</label>
                            <input type="text" class="form-control" name="Nit" id="Nit" placeholder="Ingrese el NIT"
                                value="{{ old('Nit') }}">
                            <small class="text-danger">{{ $errors->first('Nit') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Email</label>
                            <input type="Email" class="form-control" name="Email" id="Email"
                                placeholder="Ingrese el email" value="{{ old('Email') }}">
                            <small class="text-danger">{{ $errors->first('Email') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="Nombre" id="Nombre"
                                placeholder="Ingrese el nombre" value="{{ old('Nombre') }}">
                            <small class="text-danger">{{ $errors->first('Nombre') }}</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                </div>
            </div>
        </div>
        </form>

        <div class="container-fluid">
            <div class="align-left">
                <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-sm align-left"
                    data-placement="left">
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

                        <th>Idproveedor</th>
                        <th>Nombreempresa</th>
                        <th>Nit</th>
                        <th>Email</th>
                        <th>Nombre</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedore)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $proveedore->IdProveedor }}</td>
                            <td>{{ $proveedore->NombreEmpresa }}</td>
                            <td>{{ $proveedore->Nit }}</td>
                            <td>{{ $proveedore->Email }}</td>
                            <td>{{ $proveedore->Nombre }}</td>
                            <td>
                                <form action="{{ route('proveedores.destroy', $proveedore->IdProveedor) }}"
                                    method="POST">

                                    <a class="btn btn-sm btn-primary "
                                        href="#mostrarProveedores{{ $proveedore->IdProveedor }}" data-toggle="modal"
                                        data-target="#mostrarProveedores{{ $proveedore->IdProveedor }}"><i
                                            class="fa fa-fw fa-eye"></i></a>

                                    <a class="btn btn-sm btn-success" href="#editarProveedores{{ $proveedore->IdProveedor }}" data-toggle="modal"
                                        data-target="#editarProveedores{{ $proveedore->IdProveedor }}"><i class="fa fa-fw fa-edit"></i></a>


                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Vista Proveedores-->
                        <div class="modal fade" id="mostrarProveedores{{ $proveedore->IdProveedor }}" tabindex="-1"
                            role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detalles del proveedor: {{$proveedore->NombreEmpresa}}</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <h5> <strong>Nombre Empresa: </strong> {{ $proveedore->NombreEmpresa }}</h5>
                                        <h5> <strong>Nit: </strong> {{ $proveedore->Nit }}</h5>
                                        <h5> <strong>Email: </strong> {{ $proveedore->Email }}</h5>
                                        <h5> <strong>Nombre: </strong> {{ $proveedore->Nombre }}</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal editar Proveedores-->
                        <div class="modal fade" id="editarProveedores{{ $proveedore->IdProveedor }}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarProveedoresLabel">Editar Proveedor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('proveedoresActualizar',$proveedore)}}" method="post">

                                    @csrf @method('PUT')
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    @endif
                    
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nombre">Nombre de la empresa</label>
                                                <input type="text" class="form-control" name="NombreEmpresa" id="NombreEmpresa"
                                                    placeholder="Ingrese nombre de la empresa" value="{{ old('NombreEmpresa',$proveedore->NombreEmpresa) }}">
                                                <small class="text-danger">{{ $errors->first('NombreEmpresa') }}</small>
                                            </div>
                                       
                
                                        <div class="form-group">
                                            <label for="nombre">Nit</label>
                                            <input type="text" class="form-control" name="Nit" id="Nit" placeholder="Ingrese el NIT"
                                                value="{{ old('Nit',$proveedore->Nit) }}">
                                            <small class="text-danger">{{ $errors->first('Nit') }}</small>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="nombre">Email</label>
                                            <input type="Email" class="form-control" name="Email" id="Email"
                                                placeholder="Ingrese el email" value="{{ old('Email',$proveedore->Email) }}">
                                            <small class="text-danger">{{ $errors->first('Email') }}</small>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" name="Nombre" id="Nombre"
                                                placeholder="Ingrese el nombre" value="{{ old('Nombre',$proveedore->Nombre) }}">
                                            <small class="text-danger">{{ $errors->first('Nombre') }}</small>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    </div>
    {!! $proveedores->links() !!}
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
@section('scripts')
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#crearProveedoresModal').modal('show')
            })
        </script>
    @endif
@endsection
