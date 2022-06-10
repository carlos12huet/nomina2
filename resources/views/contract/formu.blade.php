<div class="box box-info padding-1">
    <div class="box-body ">
        <div class="form-group">
            {{ Form::label('Empleado') }}
            {{ Form::select('worker_id',$workers, $contract->worker_id, ['class' => 'form-control', 'disabled' . ($errors->has('worker_id') ? ' is-invalid' : ''), 'placeholder' => 'Empleado']) }}
            {!! $errors->first('worker_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Municipio') }}
            {{ Form::select('municipality_id',$municipalities, $contract->municipality_id, ['class' => 'form-control', 'disabled' . ($errors->has('municipality_id') ? ' is-invalid' : ''), 'placeholder' => 'Municipios']) }}
            {!! $errors->first('municipality_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Proyecto') }}
            {{ Form::select('project_id',$projects, $contract->proyect_id, ['class' => 'form-control', 'disabled' . ($errors->has('project_id') ? ' is-invalid' : ''), 'placeholder' => 'Proyecto']) }}
            {!! $errors->first('project_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('Departamento') }}
            {{ Form::select('department_id',$departments, $contract->department_id, ['class' => 'form-control', 'disabled' . ($errors->has('department_id') ? ' is-invalid' : ''), 'placeholder' => 'Departamento']) }}
            {!! $errors->first('department_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Puesto') }}
            {{ Form::select('position_id',$positions, $contract->position_id, ['class' => 'form-control', 'disabled' . ($errors->has('position_id') ? ' is-invalid' : ''), 'placeholder' => 'Puesto']) }}
            {!! $errors->first('position_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('Regimen') }}
            {{ Form::select('regime_id',$regimes, $contract->regime_id, ['class' => 'form-control', 'disabled' . ($errors->has('regime_id') ? ' is-invalid' : ''), 'placeholder' => 'Regimen']) }}
            {!! $errors->first('regime_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Regimen Fiscal') }}
            {{ Form::select('tax_id',$taxs, $contract->tax_id, ['class' => 'form-control', 'disabled' . ($errors->has('tax_id') ? ' is-invalid' : ''), 'placeholder' => 'Regimen Fiscal']) }}
            {!! $errors->first('tax_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo de contrato') }}
            {{ Form::select('tcontract_id',$tcontracts, $contract->tcontract_id, ['class' => 'form-control', 'disabled' . ($errors->has('tcontract_id') ? ' is-invalid' : ''), 'placeholder' => 'Contrato']) }}
            {!! $errors->first('tcontract_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Jornada') }}
            {{ Form::select('workday_id',$workdays, $contract->workday_id, ['class' => 'form-control', 'disabled' . ($errors->has('workday_id') ? ' is-invalid' : ''), 'placeholder' => 'Jornada']) }}
            {!! $errors->first('workday_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Periodo de pago') }}
            {{ Form::select('period_id',$periods, $contract->period_id, ['class' => 'form-control', 'disabled' . ($errors->has('period_id') ? ' is-invalid' : ''), 'placeholder' => 'Periodo de pago']) }}
            {!! $errors->first('period_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <br>
            <p class="fw-bold">Estado</p>
            {{ Form::label('Activo') }}
            {{ Form::radio('status', 1) }}
            {{ Form::label('Inactivo') }}
            {{ Form::radio('status', 0) }}
            {!! $errors->first('status', '<strong>Verificar que sea el unico activo</strong>') !!}
        </div>
        <div class="form-group">
            <br>
            <p class="fw-bold">Tipo</p>
            {{ Form::label('Sindicalizado') }}
            {{ Form::radio('sindicalizado', 1) }}
            {{ Form::label('Confianza') }}
            {{ Form::radio('sindicalizado', 0) }}
        </div>
        
        <br><br>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('Percepciones') }}
                            @foreach ($perceptions as $perception)
                                <br>
                                {{Form::checkbox('perceptions[]', $perception->id)}}
                                {{$perception->nombre}}
                            @endforeach
                        </div>        
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('Deducciones') }}
                            @foreach ($deductions as $deduction)
                                <br>
                                {{Form::checkbox('deductions[]', $deduction->id)}}
                                {{$deduction->nombre}}
                            @endforeach
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('Observaciones') }}
            {{ Form::text('observaciones', $contract->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    
</div>