@extends('layouts.app')

@section('template_title')
    Tabulaciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tabulaciones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tabdetail.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                                <a href="{{ route('tabdetail.import') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
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
										<th>Puesto</th>
										<th>Tabulador</th>
                                        <th>sueldo Diario</th>
                                        <th>Sualdo Mensual</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tabdetails as $tabdetail)
                                        <tr>
                                            <td>{{$tabdetail->id}}</td>
											<td>{{$tabdetail->position->nombre }}</td>
											<td>{{$tabdetail->tab->clave }}</td>
                                            <td>{{$tabdetail->sueldo_diario }}</td>
                                            <td>{{$tabdetail->sueldo_mensual }}</td>
                                            <td>{{$tabdetail->created_at}}</td>
                                            <td>{{$tabdetail->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('tabdetail.destroy',$tabdetail->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tabdetail.show',$tabdetail->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tabdetail.edit',$tabdetail->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
               {{$tabdetails->links()}}
            </div>
        </div>
    </div>
@endsection
