<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('IdVenta') }}
            {{ Form::text('IdVenta', $venta->IdVenta, ['class' => 'form-control' . ($errors->has('IdVenta') ? ' is-invalid' : ''), 'placeholder' => 'Idventa']) }}
            {!! $errors->first('IdVenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado') }}
            {{ Form::text('Estado', $venta->Estado, ['class' => 'form-control' . ($errors->has('Estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('Estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Clientes_IdCliente') }}
            {{ Form::text('Clientes_IdCliente', $venta->Clientes_IdCliente, ['class' => 'form-control' . ($errors->has('Clientes_IdCliente') ? ' is-invalid' : ''), 'placeholder' => 'Clientes Idcliente']) }}
            {!! $errors->first('Clientes_IdCliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>