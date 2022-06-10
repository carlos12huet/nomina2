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
                            <br>
                            <span class="card-title">Descripcion: {{$paydetail->payroll->descripcion}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('paydetail.index') }}"> Regresar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <caption>{{$paydetail->payroll->clave}}</caption>
                                <thead class="thead">
                                    <tr>
                                        <th>Contrato</th>
                                        <th>Percepciones</th>
                                        <th>Monto</th>
                                        <th>SAT</th>
                                        <th>Deducciones</th>
                                        <th>Monto</th>
                                        <th>SAT</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                            <strong>Total percepcion:</strong>
                                        </td>
                                        <td>
                                            @foreach ($paydetail->perceptions as $perception)
                                            {{$perception->pivot->monto}}
                                            <br>
                                            @endforeach
                                            <br>
                                            {{$paydetail->percepcion}}
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
                                            <strong>Total deduccion:</strong>    
                                        </td>
                                        <td>
                                            @foreach ($paydetail->deductions as $deduction)
                                            {{$deduction->pivot->monto}}
                                            <br>
                                            @endforeach
                                            <br>    
                                            {{$paydetail->deduccion}}
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
