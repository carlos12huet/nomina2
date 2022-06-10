@extends('layouts.app')

@section('template_title')
    Deducciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Deducciones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('deduction.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                                <a href="{{ route('deduction.import') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                                    {{ __('Importar') }}
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
										<th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deductions as $deduction)
                                        <tr>
                                            <td>{{$deduction->id}}</td>
											<td>{{$deduction->clave }}</td>
											<td>{{$deduction->nombre }}</td>
                                            <td>
                                                @switch($deduction->tipo)
                                                    @case( 1 )
                                                        Sindicalizado
                                                        @break
                                                    @case( 2 )
                                                        Ambos / Confianza
                                                        @break
                                                    @case( 3 )
                                                        Incidencia
                                                        @break
                                                    @case( 4 )
                                                        Extraordinaria
                                                        @break
                                                    @case( 5 )
                                                        Retroactivo
                                                        @break
                                                    @case( 6 )
                                                        Aguinaldo
                                                        @break
                                                    @default
                                                        
                                                @endswitch
                                            </td>
                                            <td>{{$deduction->created_at}}</td>
                                            <td>{{$deduction->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('deduction.destroy',$deduction->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('deduction.show',$deduction->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('deduction.edit',$deduction->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
               {{$deductions->links()}}
            </div>
        </div>
    </div>
@endsection
