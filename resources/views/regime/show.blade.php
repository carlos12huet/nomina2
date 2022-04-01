@extends('layouts.app')

@section('template_title')
    {{ $regime->nombre ?? 'Regimen' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Regimen {{$regime->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('regime.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $regime->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $regime->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
