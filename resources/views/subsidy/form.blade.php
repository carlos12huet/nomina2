<div class="box box-info padding-1">
    <div class="box-body ">
        
        <div class="form-group">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $subsidy->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $subsidy->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        

        <div class="form-group">
            <br>
            <p class="fw-bold">Estado</p>
            {{ Form::label('Activo') }}
            {{ Form::radio('status', 1, true) }}
            {{ Form::label('Inactivo') }}
            {{ Form::radio('status', 0) }}
            <br>
            {!! $errors->first('status', '<strong>Validar unico activo</strong>') !!}
            
        </div>
        {{--<div class="form-check {{$errors->has('status') ? 'is-invalid':''}}">
            <input type="hidden" name="status" value="0">
            <input class="form-check-input mt-3" type="checkbox" name="status" id="status" value="1" {{$worker->status || old('status',0) === 1 ? 'checked':''}}>
            <label class="form-check-label mt-2" for="status">Activo</label>
        </div>--}}
</div>