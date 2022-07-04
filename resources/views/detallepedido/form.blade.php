<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('IdDetallePedido') }}
            {{ Form::text('IdDetallePedido', $detallepedido->IdDetallePedido, ['class' => 'form-control' . ($errors->has('IdDetallePedido') ? ' is-invalid' : ''), 'placeholder' => 'Iddetallepedido']) }}
            {!! $errors->first('IdDetallePedido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad') }}
            {{ Form::text('Cantidad', $detallepedido->Cantidad, ['class' => 'form-control' . ($errors->has('Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('TotalDetallePedido') }}
            {{ Form::text('TotalDetallePedido', $detallepedido->TotalDetallePedido, ['class' => 'form-control' . ($errors->has('TotalDetallePedido') ? ' is-invalid' : ''), 'placeholder' => 'Totaldetallepedido']) }}
            {!! $errors->first('TotalDetallePedido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Pedidos_IdPedido') }}
            {{ Form::text('Pedidos_IdPedido', $detallepedido->Pedidos_IdPedido, ['class' => 'form-control' . ($errors->has('Pedidos_IdPedido') ? ' is-invalid' : ''), 'placeholder' => 'Pedidos Idpedido']) }}
            {!! $errors->first('Pedidos_IdPedido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Productos_IdProducto') }}
            {{ Form::text('Productos_IdProducto', $detallepedido->Productos_IdProducto, ['class' => 'form-control' . ($errors->has('Productos_IdProducto') ? ' is-invalid' : ''), 'placeholder' => 'Productos Idproducto']) }}
            {!! $errors->first('Productos_IdProducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>