@extends('layouts.app')

@section('template_title')
    {{ $tab->clave ?? 'Tabulador' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Tabulador: {{$tab->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('tab.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $tab->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{$tab->sindicalizado ? 'Sindicalizado' : 'Confianza' }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{$tab->status ? 'Activo' : 'Inactivo' }}
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>
                                    <th>Puesto</th>
                                    <th>Sueldo Diario</th>
                                    <th>Sueldo Mensual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tab->tabdetails as $sub)
                                    <tr>
                                        <td>{{$sub->id}}</td>
                                        <td>{{$sub->position->nombre }}</td>
                                        <td>{{$sub->sueldo_diario }}</td>
                                        <td>{{$sub->sueldo_mensual }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
