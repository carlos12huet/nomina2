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
                                <a href="{{ route('workday.import') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
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
                        <div class="input-group mb-3">
                            <input type="text" class="form-control mr-4" placeholder="Buscar" name="search">
                            <div class="input-group-append ml-4">
                              <button class="btn btn-outline-secondary ml-4" type="button">Button</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" >
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
               {{$workdays->links()}}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#example').dataTable( {
            "jQueryUI": true
        } );
    </script>
@endsection
