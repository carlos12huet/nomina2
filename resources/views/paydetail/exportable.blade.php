<table class="table table-bordered table-hover">
    <thead class="thead">
            <tr>
                <td>
                    <strong>Contrato</strong>
                </td>
                <td>
                    <strong>NOMBRE</strong>
                </td>
                <td>
                    <strong>RFC</strong>
                </td>
                @foreach ($perceptions as $perception)
                    <td>
                        <strong>
                            {{$perception->nombre}}
                        </strong>
                    </td>
                @endforeach
                <td>
                    <strong>
                        Total percepcion
                    </strong>
                </td>
                @foreach ($deductions as $deduction)
                    <td>
                        <strong>{{$deduction->nombre}}</strong>
                    </td>
                @endforeach
                <td>
                    <strong>
                        Total deduccion
                    </strong>
                </td>
                <td>
                    <strong>
                        Monto Total
                    </strong>
                </td>
            </tr>
    </thead>
    <tbody>
        @foreach ($paydetails as $paydetail)
            <tr>
                <td>
                    C-{{ $paydetail->contract_id }}
                </td>
                <td>
                    {{ $paydetail->contract->worker->nombre }}
                </td>
                <td>
                    {{ $paydetail->contract->worker->rfc }}
                </td>
                @foreach ($perceptions as $percepcion)
                <td>    
                    @foreach ($paydetail->perceptions as $perception)
                    
                        @if (($perception->pivot->perception_id == $percepcion->id))                
                            {{$perception->pivot->monto}}
                        @else
                        @endif
                    @endforeach
                </td>
                @endforeach
                <td>
                    <strong>{{$paydetail->percepcion}}</strong>
                </td>
                @foreach ($deductions as $deduccion)
                <td>    
                    @foreach ($paydetail->deductions as $deduction)
                    
                        @if (($deduction->pivot->deduction_id == $deduccion->id))                
                            {{$deduction->pivot->monto}}
                        @else
                        @endif
                    @endforeach
                </td>
                @endforeach
                <td>
                    <strong>{{$paydetail->deduccion}}</strong>
                </td>
                <td>
                    <strong>{{$paydetail->monto_total}}</strong>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>