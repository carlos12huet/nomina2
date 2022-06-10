<div class="box box-info padding-1">
    <div class="box-body ">
        <div class="form-group">
            {{ Form::label('Clave') }}
            {{ Form::text('clave', $payroll->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion') }}
            {{ Form::text('descripcion', $payroll->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <br>
            <br>
            <p class="fw-bold">Tipo Nomina</p>
            
            {{ Form::radio('tipo', 1) }}
            {{ Form::label('Normal') }}
            <br>
            
            {{ Form::radio('tipo', 2) }}
            {{ Form::label('Extraordinaria') }}
            <br>
            
            {{ Form::radio('tipo', 3) }}
            {{ Form::label('Complementaria') }}
            <br>
            
            {{ Form::radio('tipo', 4) }}
            {{ Form::label('Aguinaldo') }}
            <br>
            
            {{ Form::radio('tipo', 5) }}
            {{ Form::label('Retroactivo') }}
        </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
    </div>
</div>