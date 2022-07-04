@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pedido</h1>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@stop

@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearPedidosModal">
        <i class="fas fa-user-plus"></i> Crear nuevo </i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="crearPedidosModal" tabindex="-1" role="dialog" aria-labelledby="crearPedidosModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('pedidosGuardar') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Fecha pedido</label>
                            <input type="date" class="form-control" name="FechaPedido" id="FechaPedido"
                                placeholder="Ingrese la fecha" value="{{ old('FechaPedido') }}">
                            <small class="text-danger">{{ $errors->first('FechaPedido') }}</small>
                        </div>


                        <div class="form-group">
                            <label for="nombre">Clientes Idcliente</label>
                            <input type="hidden" class="form-control" name="Estado" id="Estado" value="1">
                            <input type="text" class="form-control" name="Clientes_IdCliente" id="Clientes_IdCliente"
                                placeholder="Ingrese el cliente" value="{{ old('Clientes_IdCliente') }}">
                            <small class="text-danger">{{ $errors->first('Clientes_IdCliente') }}</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Continuar</button>
                        </div>
                    </form>
                </div>
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
            <table id="myTable" class="table table-striped text-center display" style="width:100%">
                <thead class="thead">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Opciones</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->IdPedido }}</td>
                            <td>{{ $pedido->FechaPedido }}</td>
                            <td>{{ $pedido->Clientes_IdCliente }}</td>
                            <td>{{ $pedido->TotalPedido }}</td>
                            <td>
                                <form action="{{ route('pedidos.destroy', $pedido->IdPedido) }}" method="POST">

                                    <a class="btn btn-sm btn-primary " href="#mostrarPedidos{{ $pedido->IdPedido }}"
                                        data-toggle="modal" data-target="#mostrarPedidos{{ $pedido->IdPedido }}"><i
                                            class="fa fa-fw fa-eye"></i></a>

                                    <a class="btn btn-sm btn-success" href="#editarPedidos{{ $pedido->IdPedido }}"
                                        data-toggle="modal" data-target="#editarPedidos{{ $pedido->IdPedido }}"><i
                                            class="fa fa-fw fa-edit"></i></a>


                                    {{-- @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                    </button> --}}
                                </form>
                            </td>
                            <td>
                                @if ($pedido->Estado == 1)
                                    <button type="button" class="btn btn-warning">planificación</button>
                                @elseif($pedido->Estado == 2)
                                    <button type="button" class="btn btn-success">culminado</button>
                                @elseif($pedido->Estado == 3)
                                    <button type="button" class="btn btn-danger">cancelado</button>
                                @endif
                            </td>
                        </tr>

                        <!-- Modal Vista Pedidos-->
                        <div class="modal fade" id="mostrarPedidos{{ $pedido->IdPedido }}" tabindex="-1" role="dialog"
                            aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detalles del pedido:
                                            {{ $pedido->IdPedido }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <h5> <strong>Fechapedido: </strong> {{ $pedido->FechaPedido }}</h5>
                                        <h5> <strong>Estado: </strong> {{ $pedido->Estado }}</h5>
                                        <h5> <strong>Cliente: </strong> {{ $pedido->Clientes_IdCliente }}</h5>
                                        <h5> <strong>Totalpedido: </strong> {{ $pedido->TotalPedido }}</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-secondary"data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal editar Pedidos-->
                        <div class="modal fade" id="editarPedidos{{ $pedido->IdPedido }}" tabindex="-1"
                            role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarPedidosLabel">Editar Pedido</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('pedidosActualizar', $pedido) }}" method="post">

                                        @csrf @method('PUT')
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        @endif

                                        <div class="modal-body">


                                            <div class="form-group">
                                                <label for="nombre">Estado</label>
                                                <input type="Estado" class="form-control" name="Estado" id="Estado"
                                                    placeholder="Ingrese el estado"
                                                    value="{{ old('Estado', $pedido->Estado) }}">
                                                <small class="text-danger">{{ $errors->first('Estado') }}</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="nombre">Clientes Idcliente</label>
                                                <input type="text" class="form-control" name="Clientes_IdCliente "
                                                    id="Clientes_IdCliente " placeholder="Ingrese el cliente"
                                                    value="{{ old('Clientes_IdCliente', $pedido->Clientes_IdCliente) }}">
                                                <small
                                                    class="text-danger">{{ $errors->first('Clientes_IdCliente ') }}</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Fecha pedido</label>
                                                <input type="text" class="form-control" name="FechaPedido"
                                                    id="	FechaPedido" placeholder="Ingrese la fecha"
                                                    value="{{ old('FechaPedido', $pedido->FechaPedido) }}">
                                                <small class="text-danger">{{ $errors->first('FechaPedido') }}</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Total pedido</label>
                                                <input type="text" class="form-control" name="TotalPedido"
                                                    id="TotalPedido" placeholder="Ingrese el total"
                                                    value="{{ old('TotalPedido', $pedido->TotalPedido) }}">
                                                <small class="text-danger">{{ $errors->first('TotalPedido') }}</small>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>

@stop



@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/sweetAlert.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar MENU Registros por página",
                    "zeroRecords": "No se encontro ningun resultado",
                    "info": "Mostrando la pagina PAGE de PAGES",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Filtrado de MAX registros totales)",
                    'search': 'Buscar:',
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                },
                "order":[[5, 'desc'],[0, 'desc']]
            });
        });
    </script>
    <script>
        console.log('Hi!');
    </script>
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#crearPedidosModal').modal('show')
            })
        </script>
    @endif
@stop

@section('scripts')

@endsection
