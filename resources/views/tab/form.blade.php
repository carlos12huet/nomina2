<div class="box box-info padding-1">
    <div class="box-body ">
        <div class="form-group">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $tab->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <br>
            <p class="fw-bold">Estado</p>
            {{ Form::label('Activo') }}
            {{ Form::radio('status', 1) }}
            {{ Form::label('Inactivo') }}
            {{ Form::radio('status', 0) }}
            <br>
            {!! $errors->first('status', '<strong>Validar que sea el unico activo</strong>') !!}
        </div>
        <div class="form-group">
            <br>
            <p class="fw-bold">Tipo</p>
            {{ Form::label('Sindicalizado') }}
            {{ Form::radio('sindicalizado', 1) }}
            {{ Form::label('Confianza') }}
            {{ Form::radio('sindicalizado', 0) }}
        </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
    </div>
</div>