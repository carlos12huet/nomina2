@extends('layouts.app')

@section('template_title')
    {{ $isr->clave ?? 'ISR' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Clave: {{$isr->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('isr.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <br>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $isr->descripcion }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>status:</strong>
                            {{$isr->status ? 'activo' : 'inactivo' }}
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
										<th>Limite inferior</th>
                                        <th>limite superior</th>
                                        <th>Cuota fija</th>
                                        <th>Excedente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($isr->isrdetails as $ir)
                                        <tr>
                                            <td>{{$ir->id}}</td>
                                            <td>{{$ir->lim_inf }}</td>
											<td>{{$ir->lim_sup }}</td>
                                            <td>{{$ir->cuota }}</td>
                                            <td>{{$ir->excedente }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('isrdetail.index',$isr->id) }}"> Editar dato</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
