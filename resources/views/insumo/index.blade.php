@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Insumos</h1>
@stop

@section('content')
<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearInsumosModal">
        <i class="fas fa-user-plus"></i> Crear nuevo </i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="crearInsumosModal" tabindex="-1" role="dialog"
        aria-labelledby="crearInsumosModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo insumo</h5>
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
                    <form action="{{ route('insumosGuardar') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre del insumo</label>
                            <input type="text" class="form-control" name="Nombre" id="Nombre"
                                placeholder="Ingrese nombre del insumo" value="{{ old('Nombre') }}">
                            <small class="text-danger">{{ $errors->first('Nombre') }}</small>
                        </div>
                    

                    <div class="form-group">
                        <label for="nombre">Cantidad</label>
                        <input type="text" class="form-control" name="Cantidad" id="Cantidad" placeholder="Ingrese la cantidad"
                            value="{{ old('Cantidad') }}">
                        <small class="text-danger">{{ $errors->first('Cantidad') }}</small>
                    </div>

                    <div class="form-group">
                        <label for="nombre">Precio</label>
                        <input type="text" class="form-control" name="Precio" id="Precio"
                            placeholder="Ingrese el Precio" value="{{ old('Precio') }}">
                        <small class="text-danger">{{ $errors->first('Precio') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Estado</label>
                        <input type="text" class="form-control" name="Estado" id="Estado"
                            placeholder="Ingrese el estado" value="{{ old('Estado') }}">
                        <small class="text-danger">{{ $errors->first('Estado') }}</small>
                    </div>
                        <div class="form-group">
                        <label for="nombre">Unidad Medida</label>
                        <select name="UnidadesMedida_IdUnidadMedida" id="UnidadesMedida_IdUnidadMedida"class="form-control">>
                            @foreach($UnidadesMedida as $UnidadesMedida_IdUnidadMedidas)
                            <option value="{{$UnidadesMedida_IdUnidadMedidas['IdUnidadMedida']}}">{{$UnidadesMedida_IdUnidadMedidas['Nombre']}}</option>
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
    </form>

























































    
    
    <div class="container-fluid">
        <div class="align-left">
                            <a href="{{ route('insumos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    
                                    <th>Idinsumo</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                    <th>Unidades de medida</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($insumos as $insumo)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        
                                        <td>{{ $insumo->IdInsumo }}</td>
                                        <td>{{ $insumo->Nombre }}</td>
                                        <td>{{ $insumo->Cantidad }}</td>
                                        <td>{{ $insumo->Precio }}</td>
                                        <td>{{ $insumo->Estado }}</td>
                                        <td>{{ $insumo->UnidadesMedida->Nombre }}</td>

                                        <td>
                                            <form action="{{ route('insumos.destroy',$insumo->IdInsumo) }}" method="POST">

                                                <a class="btn btn-sm btn-primary "
                                        href="#mostrarInsumos{{ $insumo->IdInsumo }}" data-toggle="modal"
                                        data-target="#mostrarInsumos{{ $insumo->IdInsumo }}"><i
                                            class="fa fa-fw fa-eye"></i></a>

                                    <a class="btn btn-sm btn-success" href="#editarInsumos{{ $insumo->IdInsumo }}" data-toggle="modal"
                                        data-target="#editarInsumos{{ $insumo->IdInsumo }}"><i class="fa fa-fw fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal Vista Insumos-->
                        <div class="modal fade" id="mostrarInsumos{{ $insumo->IdInsumo }}" tabindex="-1"
                            role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detalles del insumo: {{$insumo->Nombre}}</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <h5> <strong>Nombre: </strong> {{ $insumo->Nombre}}</h5>
                                        <h5> <strong>Cantidad: </strong> {{ $insumo->Cantidad }}</h5>
                                        <h5> <strong>Estado: </strong> {{ $insumo->Estado }}</h5>
                                        {{--  <h5> <strong>Unidades de Medida: </strong> {{ $insumo->Estado}}</h5>  --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal editar insumos-->
                        <div class="modal fade" id="editarInsumos{{ $insumo->IdInsumo }}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarInsumosLabel">Editar insumo</h5>
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
                                                    placeholder="Ingrese nombre del insumo" value="{{ old('Nombre') }}">
                                                <small class="text-danger">{{ $errors->first('Nombre') }}</small>
                                            </div>
                                       
                
                                        <div class="form-group">
                                            <label for="nombre">Cantidad</label>
                                            <input type="text" class="form-control" name="Cantidad" id="Cantidad" placeholder="Ingrese la cantidad"
                                                value="{{ old('Cantidad') }}">
                                            <small class="text-danger">{{ $errors->first('Cantidad') }}</small>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="nombre">Estado</label>
                                            <input type="text" class="form-control" name="Estado" id="Estado"
                                                placeholder="Ingrese el estado" value="{{ old('Estado') }}">
                                            <small class="text-danger">{{ $errors->first('Estado') }}</small>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="nombre">Unidades medida</label>
                                            <input type="text" class="form-control" name="UnidadesMedida_IdUnidadMedida" id="UnidadesMedida_IdUnidadMedida"
                                                placeholder="Ingrese la unidad de medida" value="{{ old('UnidadesMedida_IdUnidadMedida') }}">
                                            <small class="text-danger">{{ $errors->first('UnidadesMedida_IdUnidadMedida') }}</small>
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
            {!! $insumos->links() !!}
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
