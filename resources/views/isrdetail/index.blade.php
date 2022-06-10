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
                            <!--<div class="float-right">
                                <input type="hidden" name="active" value="0">
                                <input type="checkbox" class="mr-2 leading-tight" name="active" id="active" value="1" {{old(0) === 1 ? 'checked':''}}>
                                <label class="form-check-label mt-2">Solo activos</label>
                            </div>-->
                            {{--<form class="form-inline my-2 my-lg-0">
                                <input type="search" name="buscarpor" class="form-control mr-sm-2" placeholder="Buscar" aria-label="Search" value="{{$buscarpor}}">
                                <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                            </form>--}}
                             <div class="float-right">
                                <a href="{{ route('isrdetail.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                                <a href="{{ route('isrdetail.import') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
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
                                        <th>Clave ISR</th>
										<th>Limite inferior</th>
                                        <th>limite superior</th>
                                        <th>Cuota fija</th>
                                        <th>Excedente</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($isrdetails as $isrdetail)
                                        <tr>
                                            <td>{{$isrdetail->id}}</td>
                                            <td>{{$isrdetail->isr->clave }}</td>
                                            <td>{{$isrdetail->lim_inf }}</td>
											<td>{{$isrdetail->lim_sup }}</td>
                                            <td>{{$isrdetail->cuota }}</td>
                                            <td>{{$isrdetail->excedente }}</td>
                                            <td>{{$isrdetail->created_at}}</td>
                                            <td>{{$isrdetail->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('isrdetail.destroy',$isrdetail->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('isrdetail.show',$isrdetail->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('isrdetail.edit',$isrdetail->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
               {{$isrdetails->links()}}
            </div>
        </div>
    </div>
@endsection
