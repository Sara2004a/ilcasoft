<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('IdUnidadMedida') }}
            {{ Form::text('IdUnidadMedida', $unidadesmedida->IdUnidadMedida, ['class' => 'form-control' . ($errors->has('IdUnidadMedida') ? ' is-invalid' : ''), 'placeholder' => 'Idunidadmedida']) }}
            {!! $errors->first('IdUnidadMedida', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion') }}
            {{ Form::text('Descripcion', $unidadesmedida->Descripcion, ['class' => 'form-control' . ($errors->has('Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>