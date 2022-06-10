<div class="box box-info padding-1">
    
    <div class="box-body d-flex justify-content-center">
        
        <input  type="number" name="lim_inf" placeholder="Limite inferior" value="{{$isrdetail->lim_inf}}" step="0.001">
        <input  type="number" name="lim_sup" placeholder="limite superior" value="{{$isrdetail->lim_sup}}" step="0.001">
        <input  type="number" name="cuota" placeholder="Cuota fija" value="{{$isrdetail->cuota}}" step="0.001">
        <input  type="number" name="excedente" placeholder="Excendente" value="{{$isrdetail->excedente}}" step="0.001">
        <br>
        
        <br>
        
        {{--<a href="" type="button" class="btn btn-sm btn-primary mx-2" onclick="agregar()">+</a>--}}
        
        
        
        {{--<div class="form-group">
            {{ Form::label('desde') }}
            {{ Form::number('desde', $subdetail->desde, ['class' => 'form-control' , 'step' => '0.001'. ($errors->has('desde') ? ' is-invalid' : ''), 'placeholder' => 'Para ingresos de']) }}
            {!! $errors->first('desde', '<div class="invalid-feedback">:message</div>') !!}
            <input  type="number" name="desde" placeholder="Con ingresos desde" value="{{$subdetail->desde}}" step="0.001">
        </div>
        <div class="form-group">
            {{ Form::label('hasta') }}
            {{ Form::number('hasta', $subdetail->hasta, ['class' => 'form-control' , 'step' => '0.001'. ($errors->has('hasta') ? ' is-invalid' : ''), 'placeholder' => 'Para ingresos hasta']) }}
            {!! $errors->first('hasta', '<div class="invalid-feedback">:message</div>') !!}
            <input  type="number" name="hasta" placeholder="Con ingresos hasta" value="{{$subdetail->desde}}" step="0.001">
        </div>

        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::number('cantidad', $subdetail->cantidad, ['class' => 'form-control', 'step' => '0.001' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
            <input  type="number" name="cantidad" placeholder="Cantidad" value="{{$subdetail->cantidad}}" step="0.001">
        </div>--}}
    </div>
    
            
    <div class="form-group">
        {{ Form::label('Clave ISR') }}
        {{ Form::select('isr_id',$isrs, $isrdetail->isr_id, ['class' => 'form-control' . ($errors->has('$isr_id') ? ' is-invalid' : ''), 'placeholder' => 'Clave ISR']) }}
        {!! $errors->first('isr_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    
</div>