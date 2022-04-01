<div class="box box-info padding-1">
    <div class="box-body ">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $worker->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
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

        <div class="form-check {{$errors->has('status') ? 'is-invalid':''}}">
            <input type="hidden" name="status" value="0">
            <input class="form-check-input mt-3" type="checkbox" name="status" id="status" value="1" {{$worker->status || old('status',0) === 1 ? 'checked':''}}>
            <label class="form-check-label mt-2" for="status">Activo</label>
        </div>


    <div class="box-footer mt20">
        <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
    </div>
</div>