@extends('layouts.app')

@section('template_title')
    Nominas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Nominas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('payroll.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                                <a class="btn btn-sm btn-success" href="{{ route('paydetail.export') }}"><i class="fa fa-fw fa-edit"></i> 
                                    Exportar nomina
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
										<th>Clave</th>
										<th>Descripcion</th>
                                        <th>Tipo</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payrolls as $payroll)
                                        <tr>
                                            <td>{{$payroll->id}}</td>
											<td>{{$payroll->clave}}</td>
											<td>{{$payroll->descripcion}}</td>
                                            <td>
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
                                                        
                                                @endswitch
                                            </td>
                                            <td>{{$payroll->created_at}}</td>
                                            <td>{{$payroll->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('payroll.destroy',$payroll->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('payroll.show',$payroll->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('payroll.edit',$payroll->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    {{csrf_field()}}
                                                    @method('DELETE')
                                                    @if (auth()->user()->role_id == 1)
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>    
                                                    @endif
                                                    @endforeach
                                                </form>
                                                
                                            </td>
                                            
                                        </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               {{$payrolls->links()}}
            </div>
        </div>
    </div>
@endsection
