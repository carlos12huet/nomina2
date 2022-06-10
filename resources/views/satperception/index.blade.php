@extends('layouts.app')

@section('template_title')
    Percepciones SAT
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Percepciones SAT') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('satperception.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                                <a href="{{ route('satperception.import') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
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
                                        <th>Creado</th>
                                        <th>Actualizado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($satperceptions as $satperception)
                                        <tr>
                                            <td>{{$satperception->id}}</td>
											<td>{{$satperception->clave }}</td>
											<td>{{$satperception->nombre }}</td>
                                            <td>{{$satperception->created_at}}</td>
                                            <td>{{$satperception->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('satperception.destroy',$satperception->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('satperception.show',$satperception->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('satperception.edit',$satperception->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
               {{$satperceptions->links()}}
            </div>
        </div>
    </div>
@endsection
