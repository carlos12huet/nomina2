@extends('layouts.app')

@section('template_title')
    Jornadas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Jornada') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('workday.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>Creado</th>
                                        <th>Actualizado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workdays as $workday)
                                        <tr>
                                            <td>{{$workday->id}}</td>
											<td>{{$workday->clave }}</td>
											<td>{{$workday->nombre }}</td>
                                            <td>{{$workday->created_at}}</td>
                                            <td>{{$workday->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('workday.destroy',$workday->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('workday.show',$workday->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('workday.edit',$workday->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
               {{$workdays->links()}}
            </div>
        </div>
    </div>
@endsection
