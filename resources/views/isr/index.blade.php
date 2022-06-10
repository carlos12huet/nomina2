@extends('layouts.app')

@section('template_title')
    ISR
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('ISR') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('isr.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>Descripcion</th>
                                        <th>Status</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($isrs as $isr)
                                        <tr>
                                            <td>{{$isr->id}}</td>
                                            <td>{{$isr->clave }}</td>
											<td>{{$isr->descripcion }}</td>
                                            <td class="fw-bold">{{$isr->status ? 'Activo' : 'Inactivo' }}</td>
                                            <td>{{$isr->created_at}}</td>
                                            <td>{{$isr->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('isr.destroy',$isr->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('isr.show',$isr->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('isr.edit',$isr->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    {{csrf_field()}}
                                                    @method('DELETE')
                                                    @if (auth()->user()->role_id == 1)
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>    
                                                    @endif
                                                    <a class="btn btn-sm btn-secondary" href="{{ route('isrdetail.import') }}"><i class="fa fa-fw fa-edit"></i> Importar</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               {{$isrs->links()}}
            </div>
        </div>
    </div>
@endsection
