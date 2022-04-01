<div class="box box-info padding-1">
    <div class="box-body ">
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $setting->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valor') }}
            {{ Form::number('valor', $setting->valor, ['class' => 'form-control' , 'step' => '0.001'. ($errors->has('valor') ? ' is-invalid' : ''), 'placeholder' => 'Valor']) }}
        </div>
        <div class="form-check {{$errors->has('status') ? 'is-invalid':''}}">
            <input type="hidden" name="status" value="0">
            <input class="form-check-input mt-3" type="checkbox" name="status" id="status" value="1" {{$setting->status || old('status',0) === 1 ? 'checked':''}}>
            <label class="form-check-label mt-2" for="status">Activo</label>
        </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
    </div>
</div>