<div class="row">
    <div class="row">
        <div class="col">
            <h3 class="text-center ">Compras</h3>
        </div>
    </div>
    <form action="#" method="post">
        @csrf
        <form action="/producto/guardar" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-head">
                            <h4 class="text-center">1. Info producto</h4>
                           
                        </div>
                        <div class="row card-body">
                            <div class="row card-body">
                                <div class="form-group col-4">
                                    <label for="">Factura</label>
                                    <input type="text" class="form-control" name="factura">
                                </div>
                                <div class="form-group col-4">
                                    <label for="">Precio</label>
                                    <input readonly type="text" class="form-control" name="precio" value="0">
                                </div>
                                <div class="form-group col-4">
                                    <label for="">Fecha</label>
                                    <input type="date" class="form-control" name="nombre">
                                </div>
                                <div class="form-group col-2">
                                    <label for="">Estado</label>
                                    <input type="text" class="form-control" name="estado">
                                </div>
                                <div class="form-group col-4">
                                    <label for="">Proveedor</label>
                                    <select name="Proveedores_IdProveedor" id="Proveedores_IdProveedor" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($Proveedores_IdProveedor as $Proveedores_IdProveedores)
                                        <option value="{{$Proveedores_IdProveedores['IdProveedor']}}">{{$Proveedores_IdProveedores['NombreEmpresa']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-8" style="margin-top: 3%;">
                                    <button type="submit" class="btn btn-success btn-block">Guardar</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-head">
                            <h4 class="text-center">2. Info insumos</h4>
                        </div>
                        <div class="row card-body">
                            <div class="col-6">
                                <div class="form-group col-8">
                                    <label for="">Nombre</label>
                                    <select name="insumos" id="insumos" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($insumos as $insumo)
                                        <option value="{{$insumo['IdInsumo']}}">{{$insumo['Nombre']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Cantidad</label>
                                    <input  type="number" id="cantidad" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Precio</label>
                                    <input id="precio" type="text" class="form-control" >
                                </div>
                            </div>
                            <div class="col-12">
                                <button onclick="agregar_insumo()" type="button"
                                    class="btn btn-success float-right">Agregar</button>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Sub Total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="tblInsumos">
        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
