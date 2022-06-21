<div class="box box-info padding-1">
    <div class="box-body ">

        <div class="form-group">
            {{ Form::label('Apellido Paterno') }}
            {{ Form::text('paterno', $worker->paterno, ['class' => 'form-control' . ($errors->has('paterno') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Paterno']) }}
            {!! $errors->first('paterno', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Apellido Materno') }}
            {{ Form::text('materno', $worker->materno, ['class' => 'form-control' . ($errors->has('materno') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Materno']) }}
            {!! $errors->first('materno', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Nombres') }}
            {{ Form::text('nombre', $worker->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('Nombre completo') }}
            {{ Form::text('nombres', $worker->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'disabled', 'placeholder' => 'SLUG']) }}
            {!! $errors->first('nombre_completo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('rfc') }}
            {{ Form::text('rfc', $worker->rfc, ['class' => 'form-control' . ($errors->has('rfc') ? ' is-invalid' : ''), 'placeholder' => 'RFC']) }}
            {!! $errors->first('rfc', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('nss') }}
            {{ Form::text('nss', $worker->nss, ['class' => 'form-control' . ($errors->has('nss') ? ' is-invalid' : ''), 'placeholder' => 'NSS']) }}
            {!! $errors->first('nss', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('curp') }}
            {{ Form::text('curp', $worker->curp, ['class' => 'form-control' . ($errors->has('curp') ? ' is-invalid' : ''), 'placeholder' => 'CURP']) }}
            {!! $errors->first('curp', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('correo') }}
            {{ Form::text('correo', $worker->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
            {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
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