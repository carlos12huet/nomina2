<div class="box box-info padding-1">
    <div class="box-body ">
        <div class="form-group">
            <strong>Usuario:</strong>
            {{ $user->username }}
        </div>
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $user->name }}
        </div>
        <div class="form-group">
            {{ Form::label('Rol') }}
            {{ Form::select('role_id',$roles, $user->role_id, ['class' => 'form-control' . ($errors->has('role_id') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
            {!! $errors->first('role_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
    </div>
</div>