@extends('layouts.app')

@section('template_title')
    Contrato
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Contrato: C-{{$contract->id}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('contract.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $contract->worker->nombre }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>RFC:</strong>
                            {{ $contract->worker->rfc }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Puesto:</strong>
                            {{ $contract->position->nombre }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $contract->department->nombre }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Proyecto:</strong>
                            {{ $contract->project->nombre }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Municipio:</strong>
                            {{ $contract->municipality->nombre }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Regimen:</strong>
                            {{ $contract->regime->nombre }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Regimen Fiscal:</strong>
                            {{ $contract->tax->nombre }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Tipo de Contrato:</strong>
                            {{ $contract->tcontract->nombre }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Periodo de pago:</strong>
                            {{ $contract->period->nombre }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Jornada:</strong>
                            {{ $contract->workday->nombre }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $contract->status ? 'Activo' : 'Inactivo' }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Tipo de empleado:</strong>
                            {{ $contract->sindicalizado ? 'Sindicalizado' : 'Confianza' }}
                        </div>
                        <br>
                        <div class="form-group">
                            @if ($contract->observaciones == Null)
                                <strong>Sin observaciones</strong>
                            @else
                                <strong>Observaciones:</strong>
                                {{ $contract->observaciones}}
                            @endif
                        </div>
                        <br>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Percepciones </strong>
                                        @foreach ($contract->perceptions as $proyect)
                                        <br>    
                                            {{$proyect->nombre}}
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Deducciones </strong>
                                        @foreach ($contract->deductions as $proyect)
                                        <br>
                                            {{$proyect->nombre}}
                                        @endforeach
                                    </div>            
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
