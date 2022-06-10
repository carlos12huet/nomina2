@extends('layouts.app')

@section('template_title')
    Registro
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registro') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('setting.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                                <a href="{{ route('setting.import') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
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
										<th>Nombre</th>
										<th>Valor</th>
                                        <th>status</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($settings as $setting)
                                        <tr>
                                            <td>{{$setting->id}}</td>
											<td>{{$setting->nombre }}</td>
											<td>{{$setting->valor }}</td>
                                            <td>{{$setting->status ? 'Activo' : 'Inactivo' }}</td>
                                            <td>{{$setting->created_at}}</td>
                                            <td>{{$setting->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('setting.destroy',$setting->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('setting.show',$setting->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('setting.edit',$setting->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
               {{$settings->links()}}
            </div>
        </div>
    </div>
@endsection
