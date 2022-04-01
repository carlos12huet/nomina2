@extends('layouts.app')

@section('template_title')
    Departamentos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Departamentos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('department.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
										<th>Clave</th>
										<th>Nombre</th>
                                        <th>Proyecto</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                        <tr>
                                            <td>{{$department->id}}</td>
											<td>{{$department->clave }}</td>
											<td>{{$department->nombre }}</td>
                                            <td>{{ $department->project->nombre }}</td>
                                            <td>{{$department->created_at}}</td>
                                            <td>{{$department->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('department.destroy',$department->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('department.show',$department->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('department.edit',$department->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    {{csrf_field()}}
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               {{$departments->links()}}
            </div>
        </div>
    </div>
@endsection
