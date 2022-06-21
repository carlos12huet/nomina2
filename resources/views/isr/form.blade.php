<div class="box box-info padding-1">
    <div class="box-body ">
        
        <div class="form-group">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $isr->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $isr->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            <br>
            <p class="fw-bold">Tipo</p>
            {{ Form::label('Quincenal') }}
            {{ Form::radio('tipo', 1, true) }}
            {{ Form::label('Mensual') }}
            {{ Form::radio('tipo', 0) }}
            <br>
        </div>

        <div class="form-group">
            <br>
            <p class="fw-bold">Estado</p>
            {{ Form::label('Activo') }}
            {{ Form::radio('status', 1, true) }}
            {{ Form::label('Inactivo') }}
            {{ Form::radio('status', 0) }}
            <br>
            {!! $errors->first('status', '<strong>Verificar que sea el unico activo</strong>') !!}
        </div>
</div>