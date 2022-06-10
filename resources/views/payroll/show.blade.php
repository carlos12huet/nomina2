@extends('layouts.app')

@section('template_title')
    Nomina
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Nomina: {{$payroll->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('payroll.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $payroll->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $payroll->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            @switch($payroll->tipo)
                            @case( 1 )
                                Normal
                                @break
                            @case( 2 )
                                Extraordinaria
                                @break
                            @case( 3 )
                                Complementaria
                                @break
                            @case( 4 )
                                Aguinaldo
                                @break
                            @case( 5 )
                                Retroactivo
                                @break
                            @default
                            @break
                            @endswitch
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Contrato</th>
                                        <th>Percepciones</th>
                                        <th>Monto</th>
                                        <th>SAT</th>
                                        <th>Deducciones</th>
                                        <th>Monto</th>
                                        <th>SAT</th>
                                        <th>Total a pagar</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    @foreach ($paydetails as $paydetail)
                                    <tr>
                                        <td>
                                            <strong>Contrato:</strong>            
                                            C-{{ $paydetail->contract_id }}
                                            <br>
                                            <strong>Nombre:</strong>
                                            {{ $paydetail->contract->worker->nombre }}
                                            <br>
                                            <strong>RFC:</strong>
                                            {{ $paydetail->contract->worker->rfc }}
                                        </td>
                                        <td>
                                            @foreach ($paydetail->perceptions as $perception)
                                            {{$perception->nombre}}
                                            <br>
                                            @endforeach
                                            <br>
                                            <strong>Total percepciones:</strong>
                                        </td>
                                        <td>
                                            @foreach ($paydetail->perceptions as $perception)
                                            {{$perception->pivot->monto}}
                                            <br>
                                            @endforeach
                                            <br>
                                            <strong>{{$paydetail->percepcion}}</strong>
                                        </td>
                                        <td>
                                            @foreach ($paydetail->perceptions as $perception)
                                            @if($perception->satperception == null)
                                            @else
                                            {{$perception->satperception->clave}}
                                            <br>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($paydetail->deductions as $deduction)
                                            {{$deduction->nombre}}
                                            <br>
                                            @endforeach
                                            <br>
                                            <strong>Total deducciones:</strong>
                                        </td>
                                        <td>
                                            @foreach ($paydetail->deductions as $deduction)
                                            {{$deduction->pivot->monto}}
                                            <br>
                                            @endforeach
                                            <br>
                                            <strong>{{$paydetail->deduccion}}</strong>
                                        </td>
                                        <td>
                                            @foreach ($paydetail->deductions as $deduction)
                                            @if($deduction->satdeduction == null)
                                            @else
                                            {{$deduction->satdeduction->clave}}
                                            @endif
                                            <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <strong>{{$paydetail->monto_total}}</strong>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
