<div class="box box-info padding-1">
    <div class="box-body ">
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $setting->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valor') }}
            {{ Form::number('valor', $setting->valor, ['class' => 'form-control' , 'step' => '0.001'. ($errors->has('valor') ? ' is-invalid' : ''), 'placeholder' => 'Valor']) }}
        </div>
        <div class="form-group">
            <br>
            <p class="fw-bold">Estado</p>
            {{ Form::label('Activo') }}
            {{ Form::radio('status', 1, true) }}
            {{ Form::label('Inactivo') }}
            {{ Form::radio('status', 0) }}
        </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
    </div>
</div>