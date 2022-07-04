<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('IdDetalleCompra') }}
            {{ Form::text('IdDetalleCompra', $detallecompra->IdDetalleCompra, ['class' => 'form-control' . ($errors->has('IdDetalleCompra') ? ' is-invalid' : ''), 'placeholder' => 'Iddetallecompra']) }}
            {!! $errors->first('IdDetalleCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad') }}
            {{ Form::text('Cantidad', $detallecompra->Cantidad, ['class' => 'form-control' . ($errors->has('Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio') }}
            {{ Form::text('Precio', $detallecompra->Precio, ['class' => 'form-control' . ($errors->has('Precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('Precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado') }}
            {{ Form::text('Estado', $detallecompra->Estado, ['class' => 'form-control' . ($errors->has('Estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('Estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Insumos_IdInsumo') }}
            {{ Form::text('Insumos_IdInsumo', $detallecompra->Insumos_IdInsumo, ['class' => 'form-control' . ($errors->has('Insumos_IdInsumo') ? ' is-invalid' : ''), 'placeholder' => 'Insumos Idinsumo']) }}
            {!! $errors->first('Insumos_IdInsumo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Compras_IdCompra') }}
            {{ Form::text('Compras_IdCompra', $detallecompra->Compras_IdCompra, ['class' => 'form-control' . ($errors->has('Compras_IdCompra') ? ' is-invalid' : ''), 'placeholder' => 'Compras Idcompra']) }}
            {!! $errors->first('Compras_IdCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>