@extends('layouts.app')

@section('template_title')
    Trabajadores
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Trabajadores') }}
                            </span>
                            
                            <div class="justify-content-center">
                                {{--<input type="checkbox" class="mr-2 leading-tight" name="status" value="1">
                                <label class="form-check-label mt-2">Solo activos</label>--}}
                                <form class="form-inline my-2 my-lg-0">
                                    
                                    <input type="search" name="buscarpor" class="form-control mr-sm-2" placeholder="Buscar" aria-label="Search" value="{{$buscarpor}}">
                                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </div>
                             <div class="float-right">
                                <a href="{{ route('worker.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                                <a href="{{ route('worker.import') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
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
                                        <th>RFC</th>
                                        <th>Status</th>
                                        <th>Alta</th>
                                        <th>Actualizado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workers as $worker)
                                        <tr>
                                            <td>{{$worker->id}}</td>
                                            <td>{{$worker->nombre }}</td>
											<td>{{$worker->rfc }}</td>
                                            <td>{{$worker->status ? 'activo' : 'inactivo' }}</td>
                                            <td>{{$worker->created_at}}</td>
                                            <td>{{$worker->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('worker.destroy',$worker->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('worker.show',$worker->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('worker.edit',$worker->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
               {{$workers->links()}}
            </div>
        </div>
    </div>
@endsection
