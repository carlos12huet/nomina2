@extends('layouts.app')

@section('template_title')
    Contratos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Contratos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('contract.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>ID Contrato</th>
										<th>Empleado</th>
										<th>RFC</th>
                                        <th>Puesto</th>
                                        <th>Status</th>
                                        <th>Tipo de Empleado</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contracts as $contract)
                                        <tr>
                                            <td>C-{{$contract->id}}</td>
											<td>{{$contract->worker->nombre }}</td>
											<td>{{$contract->worker->rfc }}</td>
                                            <td>{{$contract->position->nombre }}</td>
                                            <td>{{ $contract->status ? 'Activo' : 'Inactivo' }}</td>
                                            <td>{{ $contract->sindicalizado ? 'Sindicalizado' : 'Confianza' }}</td>
                                            <td>{{$contract->created_at}}</td>
                                            <td>{{$contract->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('contract.destroy',$contract->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('contract.show',$contract->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('contract.edit',$contract->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
               {{$contracts->links()}}
            </div>
        </div>
    </div>
@endsection
