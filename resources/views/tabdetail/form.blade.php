<div class="box box-info padding-1">
    <div class="box-body ">
        <div class="form-group">
            {{ Form::label('Puesto') }}
            {{ Form::select('position_id',$positions, $tabdetail->subs_id, ['class' => 'form-control' . ($errors->has('position_id') ? ' is-invalid' : ''), 'placeholder' => 'Puesto']) }}
            {!! $errors->first('position_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tabulador') }}
            {{ Form::select('tab_id',$tabs, $tabdetail->tab_id, ['class' => 'form-control' . ($errors->has('tab_id') ? ' is-invalid' : ''), 'placeholder' => 'Clave Tabulador']) }}
            {!! $errors->first('tab_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Zona economica') }}
            {{ Form::text('zona_economina', $tabdetail->zona_economina, ['class' => 'form-control' . ($errors->has('zona_economina') ? ' is-invalid' : ''), 'placeholder' => 'Clave Zona economica']) }}
            {!! $errors->first('zona_economina', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <br>
        <br>
        
        <input  type="number" name="compensacion" placeholder="Compensacion" value="{{$tabdetail->compensacion}}" step="0.001">
        <input  type="number" name="sueldo_diario" placeholder="Sueldo Diario" value="{{$tabdetail->sueldo_diario}}" step="0.001">
        <input  type="number" name="sueldo_mensual" placeholder="Sueldo Mensual" value="{{$tabdetail->sueldo_mensual}}" step="0.001">
        
    <div class="box-footer mt20">
        <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
    </div>
</div>