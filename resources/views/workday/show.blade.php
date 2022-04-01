@extends('layouts.app')

@section('template_title')
    {{ $workday->nombre ?? 'Jornada' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Jornada {{$workday->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('workday.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $workday->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $workday->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
