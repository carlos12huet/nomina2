@extends('layouts.app')

@section('template_title')
    Nomina
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Nomina') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('paydetail.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Trabajador</th>
                                        <th>Nomina</th>
                                        <th>Total Percepcion</th>
                                        <th>Total deduccion</th>
										<th>Total a pagar</th>
                                        <th>Actualizado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paydetails as $paydetail)
                                        <tr>
                                            <td>{{$paydetail->id}}</td>
                                            <td>{{$paydetail->contract->worker->nombre}}</td>
                                            <td>{{$paydetail->payroll->clave}}</td>
                                            <td>{{$paydetail->percepcion }}</td>
                                            <td>{{$paydetail->deduccion }}</td>
											<td>{{$paydetail->monto_total }}</td>
                                            <td>{{$paydetail->created_at}}</td>
                                            <td>{{$paydetail->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('paydetail.destroy',$paydetail->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('paydetail.show',$paydetail->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('paydetail.edit',$paydetail->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    {{csrf_field()}}
                                                    @method('DELETE')
                                                    @if (auth()->user()->role_id == 1)
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>    
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               {{$paydetails->links()}}
            </div>
        </div>
    </div>
@endsection
