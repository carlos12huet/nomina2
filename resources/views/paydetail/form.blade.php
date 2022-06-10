<div class="box box-info padding-1">
    
    <br>
    <div class="box-body ">
        <div class="form-group">
            <br>
            {{ Form::label('Contrato') }}
            {{ Form::select('contract_id',$contracts, $paydetail->contract_id, ['class' => 'form-control' . ($errors->has('$contract_id') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {{ $errors->first('contract_id', '<div class="invalid-feedback">:message</div>') }}
        </div>
        <div class="form-group">
            {{ Form::label('Nomina') }}
            {{ Form::select('payroll_id',$payrolls, $paydetail->payroll_id, ['class' => 'form-control' . ($errors->has('$payroll_id') ? ' is-invalid' : ''), 'placeholder' => 'Nomina']) }}
            {!! $errors->first('payroll_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br><br>
        <div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Compensacion</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Horas Extra</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Faltas o Incapacidad</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Aportaciones</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pension-tab" data-bs-toggle="tab" data-bs-target="#pension" type="button" role="tab" aria-controls="pension" aria-selected="false">Pension</button>
                </li>
            </ul>
              
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="form-group">
                        {{ Form::label('Compensacion') }}
                        <input type="number" class="form-control"  name="compensacion" step ="0.001" placeholder="Ingresa monto compensacion">
                    </div>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="form-group">
                        {{ Form::label('Ingresar horas extra') }}
                        <input type="number" class="form-control"  name="horasextra" placeholder="Ingresa total de horas">
                    </div>
                </div>
                <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                    <div class="form-group">
                        {{ Form::label('Ingresar dias de falta') }}
                        <input type="number" class="form-control"  name="faltas" placeholder="Ingresa total de dias">
                    </div>
                    <div class="form-group">
                        {{ Form::label('Ingresar incapacidad') }}
                        <input type="number" class="form-control"  name="incapacidad" placeholder="Ingresa total de dias">
                    </div>
                </div>
                <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                    <div class="form-group">
                        {{ Form::label('Infonacot') }}
                        <input type="number" class="form-control"  name="infonacot" step ="0.001" placeholder="Ingresa monto infonacot">
                    </div>
                    <div class="form-group">
                        {{ Form::label('Enlace') }}
                        <input type="number" class="form-control"  name="enlace" step ="0.001" placeholder="Ingresa monto Enlace">
                    </div>
                    <div class="form-group">
                        {{ Form::label('Infonavit') }}
                        <input type="number" class="form-control"  name="infonavit" step ="0.001" placeholder="Ingresa monto Infonavit">
                    </div>
                </div>
                <div class="tab-pane" id="pension" role="tabpanel" aria-labelledby="pension-tab">
                    <div class="form-group">
                        {{ Form::label('Pension Alimenticia') }}
                        <input type="number" class="form-control"  name="pension" step ="0.001" placeholder="Ingresa monto porcentaje en decimal">
                    </div>
                </div>
            </div>
              
              <script>
                var firstTabEl = document.querySelector('#myTab li:last-child a')
                var firstTab = new bootstrap.Tab(firstTabEl)
              
                firstTab.show()
              </script>
            
        </div>
        <br><br>
    <div class="box-footer mt20">
        <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
    </div>
</div>