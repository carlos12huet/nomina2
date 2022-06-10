@extends('layouts.app')

@section('template_title')
    {{ $municipality->nombre ?? 'Municipio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Municipio: {{$municipality->nombre}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('municipality.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $municipality->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Proyectos ubicados en </strong>
                            {{ $municipality->nombre }}
                            @foreach ($municipality->projects as $proyect)
                            <br>    
                                {{$proyect->nombre}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
