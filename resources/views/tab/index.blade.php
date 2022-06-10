@extends('layouts.app')

@section('template_title')
    Tabuladores
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tabuladores') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tab.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Clave</th>
										<th>Tipo</th>
                                        <th>Status</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tabs as $tab)
                                        <tr>
                                            <td>{{$tab->id}}</td>
											<td>{{$tab->clave }}</td>
											<td>{{$tab->sindicalizado ? 'Sindicalizado' : 'Confianza' }}</td>
                                            <td>{{$tab->status ? 'Activo' : 'Inactivo' }}</td>
                                            <td>{{$tab->created_at}}</td>
                                            <td>{{$tab->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('tab.destroy',$tab->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tab.show',$tab->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tab.edit',$tab->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
               {{$tabs->links()}}
            </div>
        </div>
    </div>
@endsection
