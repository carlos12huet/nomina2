@extends('layouts.app')

@section('template_title')
    {{ $subsidy->clave ?? 'Subsidio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Subsidio: {{$subsidy->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('subsidy.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>clave:</strong>
                            {{ $subsidy->clave }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $subsidy->descripcion }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>status:</strong>
                            {{$subsidy->status ? 'activo' : 'inactivo' }}
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Para ingresos desde $</th>
                                        <th>Para ingresos hasta $</th>
                                        <th>Cantidad de subsidio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subsidy->subdetails as $sub)
                                        <tr>
                                            <td>{{$sub->id}}</td>
                                            <td>$ {{$sub->desde }}</td>
                                            <td>$ {{$sub->hasta }}</td>
                                            <td>$ {{$sub->cantidad }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('subdetail.index') }}">Editar dato</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
