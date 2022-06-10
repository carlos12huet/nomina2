@extends('layouts.app')

@section('template_title')
    {{ $satperception->nombre ?? 'Percepcion SAT' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Percepcion SAT: {{$satperception->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('satperception.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $satperception->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $satperception->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
