@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')

<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearClientesModal">
        <i class="fas fa-user-plus"></i> Crear nuevo </i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="crearClientesModal" tabindex="-1" role="dialog"
        aria-labelledby="crearClientesModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearClientesModalLabel">Nuevo Cliente</h5>
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
                    <form action="{{ route('clientesGuardar') }}" method="POST">
                        @csrf
                      
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="Nombre" id="Nombre"
                                    placeholder="Ingrese nombre" value="{{ old('Nombre') }}">
                                <small class="text-danger">{{ $errors->first('Nombre') }}</small>
                            </div>
                        

                        <div class="form-group">
                            <label for="nombre">Apellido</label>
                            <input type="text" class="form-control" name="Apellido" id="Apellido" placeholder="Ingrese el Apellido"
                                value="{{ old('Apellido') }}">
                            <small class="text-danger">{{ $errors->first('Apellido') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Cedula</label>
                            <input type="text" class="form-control" name="Cedula" id="Cedula"
                                placeholder="Ingrese la Cedula" value="{{ old('Cedula') }}">
                            <small class="text-danger">{{ $errors->first('Cedula') }}</small>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Telefono</label>
                            <input type="text" class="form-control" name="Telefono" id="Telefono"
                                placeholder="Ingrese el Telefono" value="{{ old('Telefono') }}">
                            <small class="text-danger">{{ $errors->first('Telefono') }}</small>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Direccion</label>
                            <input type="text" class="form-control" name="Direccion" id="Direccion"
                                placeholder="Ingrese el Telefono" value="{{ old('Direccion') }}">
                            <small class="text-danger">{{ $errors->first('Direccion') }}</small>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Email</label>
                            <input type="Email" class="form-control" name="Email" id="Email"
                                placeholder="Ingrese el Telefono" value="{{ old('Email') }}">
                            <small class="text-danger">{{ $errors->first('Email') }}</small>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Estado</label>
                            <input type="text" class="form-control" name="Estado" id="Estado"
                                placeholder="Ingrese el Telefono" value="{{ old('Estado') }}">
                            <small class="text-danger">{{ $errors->first('Estado') }}</small>
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
                        <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm align-left"
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
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>                  
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{$cliente->IdCliente}}</td>
                                        <td>{{ $cliente->Nombre }}</td>
                                        <td>{{ $cliente->Apellido }}</td>
                                        <td>{{ $cliente->Telefono }}</td>
                                        <td>{{ $cliente->Direccion }}</td>
                                        <td>{{ $cliente->Email }}</td>
                                        <td>{{ $cliente->Estado }}</td>

                                        <td>
                                            <form action="{{ route('clientes.destroy',$cliente->IdCliente) }}" method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                href="#mostrarClientes{{ $cliente->IdCliente }}" data-toggle="modal" data-target="#mostrarClientes{{ $cliente->IdCliente }}"><i class="fa fa-fw fa-eye"></i></a>
                                                <a class="btn btn-sm btn-success" href="{{ route('clientes.edit',$cliente->IdCliente) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                            </form>
                                        </td>

                                        <td id="resp{{ $cliente->IdCliente }}">
                                            
                                              @if($cliente->Estado == 1)
                                              <button type="button" class="btn btn-sm btn-success">Activa</button>
                                                  @else
                                              <button type="button" class="btn btn-sm btn-danger">Inactiva</button>
                                              @endif
                                          
                                          </td>
                                            <td>
                                                <label class="switch">
                                                    <input data-id="{{ $cliente->IdCliente }}" class="mi_checkbox" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $cliente->Estado ? 'checked' : '' }}>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>

                                            {{--  <td>
                                                <label class="custom-control ios-switch">
                                                    <input type="checkbox" class="ios-switch-control-input" checked="">
                                                    <span class="ios-switch-control-indicator"></span>
                                                </label>
                                            </td>  --}}
                                    </tr>

                                    <!-- Modal Vista Proveedores-->
                                    <div class="modal fade" id="mostrarClientes{{ $cliente->IdCliente }}" tabindex="-1"
                                        role="dialog" aria-labelledby="" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detalles del cliente: {{ $cliente->Nombre }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
            
                                                <div class="modal-body">
                                                    <h5> <strong>Nombre: </strong> {{ $cliente->Nombre }}</h5>
                                                    <h5> <strong>Apellido: </strong>{{ $cliente->Apellido }}</h5>
                                                    <h5> <strong>Cedula: </strong>{{ $cliente->Cedula }}</h5>
                                                    <h5> <strong>Telefono: </strong> {{ $cliente->Telefono }}</h5>
                                                    <h5> <strong>Direccion: </strong> {{ $cliente->Direccion }}</h5>
                                                    <h5> <strong>Email: </strong> {{ $cliente->Email }}</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal editar clientes-->
                        <div class="modal fade" id="editarClientes{{ $cliente->IdCliente}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarClientesLabel">Editar clientes</h5>
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
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" name="Nombre" id="Nombre"
                                                placeholder="Ingrese nombre" value="{{ old('Nombre') }}">
                                            <small class="text-danger">{{ $errors->first('Nombre') }}</small>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="nombre">Apellido</label>
                                        <input type="text" class="form-control" name="Apellido" id="Apellido" placeholder="Ingrese el Apellido"
                                            value="{{ old('Apellido') }}">
                                        <small class="text-danger">{{ $errors->first('Apellido') }}</small>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="nombre">Cedula</label>
                                        <input type="text" class="form-control" name="Cedula" id="Cedula"
                                            placeholder="Ingrese la Cedula" value="{{ old('Cedula') }}">
                                        <small class="text-danger">{{ $errors->first('Cedula') }}</small>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="nombre">Telefono</label>
                                        <input type="text" class="form-control" name="Telefono" id="Telefono"
                                            placeholder="Ingrese el Telefono" value="{{ old('Telefono') }}">
                                        <small class="text-danger">{{ $errors->first('Telefono') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Direccion</label>
                                        <input type="text" class="form-control" name="Direccion" id="Direccion"
                                            placeholder="Ingrese el Telefono" value="{{ old('Direccion') }}">
                                        <small class="text-danger">{{ $errors->first('Direccion') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Email</label>
                                        <input type="Email" class="form-control" name="Email" id="Email"
                                            placeholder="Ingrese el Telefono" value="{{ old('Email') }}">
                                        <small class="text-danger">{{ $errors->first('Email') }}</small>
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
            {!! $clientes->links() !!}
        </div>
    </div>
</div>
@stop

{{--  @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cargando.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/maquinawrite.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/switch.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cssGeneral.css') }} ">
@stop  --}}

@section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script> console.log('Hi!'); </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(window).load(function() {
                $(".cargando").fadeOut(1000);
            });
    
    
    $('.mi_checkbox').change(function() {
        //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
        var Estado = $(this).prop('checked') == true ? 1 : 0; 
        var IdCliente = $(this).data('IdCliente'); 
            console.log(Estado);
    
        $.ajax({
            type: "GET",
            dataType: "json",
            //url: '/StatusNoticia',
            url: '{{ route('UpdateStatusNoti') }}',
            data: {'Estado': Estado, 'IdCliente': IdCliente},
            success: function(data){
                $('#resp' + IdCliente).html(data.var); 
                console.log(data.var)
             
            }
        });
    })
          
    });
    </script>
@stop