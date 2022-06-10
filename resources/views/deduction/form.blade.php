<div class="box box-info padding-1">
    <div class="box-body ">
        <div class="form-group">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $deduction->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $deduction->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('SAT') }}
            <br>
            {{ Form::select('satdeduction_id',$satdeductions,$deduction->satdeduction_id, ['class' => 'form-control' . ($errors->has('satdeduction_id') ? ' is-invalid' : ''), 'placeholder' => 'SAT']) }}
            {{ $errors->first('satdeduction_id', '<div class="invalid-feedback">:message</div>') }}
        </div>
        <div class="form-group">
            <br>
            {{ Form::label('SIHAE') }}
            @foreach ($sihaes as $sihae)
                <br>
                {{Form::checkbox('sihaes[]', $sihae->id,)}}
                {{$sihae->clave}}
            @endforeach
        </div>
        <div class="form-group">
            <br>
            <strong>Tipo de deduccion</strong>
            <br>
            <br>
            <p class="fw-bold">Tipo de deduccion</p>
            
            {{ Form::radio('tipo', 1) }}
            {{ Form::label('Sindicalizado') }}
            <br>
            
            {{ Form::radio('tipo', 2) }}
            {{ Form::label('Ambas / Confianza') }}
            <br>
            
            {{ Form::radio('tipo', 3) }}
            {{ Form::label('Incidencia') }}
            <br>
            
            {{ Form::radio('tipo', 4) }}
            {{ Form::label('Extraordinaria') }}
            <br>
            
            {{ Form::radio('tipo', 5) }}
            {{ Form::label('Retroactivo') }}
            <br>
            
            {{ Form::radio('tipo', 6) }}
            {{ Form::label('Aguinaldo') }}

        </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
    </div>
</div>