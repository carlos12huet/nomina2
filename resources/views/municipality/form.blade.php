<div class="box box-info padding-1">
    <div class="box-body ">
        <div class="form-group">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $municipality->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $municipality->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <br>
            <br>
            {{ Form::label('Proyectos en el municipio') }}
            @foreach ($projects as $project)
                <br>
                {{Form::checkbox('projects[]', $project->id)}}
                {{$project->nombre}}
            @endforeach
        </div>
    <div class="box-footer mt20">
        <br>
        <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
    </div>
</div>