<div class="box box-info padding-1">
    <div class="box-body ">
        <div class="form-group">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $project->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $project->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <br>
            <br>
            {{ Form::label('Departamentos') }}
            @foreach ($departments as $department)
                <br>
                {{Form::checkbox('departments[]', $department->id,)}}
                {{$department->nombre}}
            @endforeach
        </div>
        <div class="form-group">
            <br>
            <br>
            {{ Form::label('Muncipios') }}
            @foreach ($municipalities as $municipality)
                <br>
                {{Form::checkbox('municipalities[]', $municipality->id,)}}
                {{$municipality->nombre}}
            @endforeach
        </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
    </div>
</div>