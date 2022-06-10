@extends('layouts.app')

@section('template_title')
    {{ $perception->nombre ?? 'Percepcion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Percepcion: {{$perception->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('perception.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            <br>
                            {{ $perception->clave }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            <br>
                            {{ $perception->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            <br>
                            @switch($perception->tipo)
                                @case( 1 )
                                    Sindicalizado
                                    @break
                                @case( 2 )
                                    Ambos / Confianza
                                    @break
                                @case( 3 )
                                    Incidencia
                                    @break
                                @case( 4 )
                                    Extraordinaria
                                    @break
                                @case( 5 )
                                    Retroactivo
                                    @break
                                @case( 6 )
                                    Aguinaldo
                                    @break
                                @default                    
                            @endswitch
                        </div>
                        <div class="form-group">
                            <br>
                            <strong>Percepciones SAT: </strong>
                            
                            @if ($perception->satperception == null)
                                <br>
                            @else
                            <br>
                                {{$perception->satperception->clave}}
                                {{$perception->satperception->nombre}}
                            @endif
                            
                            <br>
                            <br>
                            <strong>SIHAE: </strong>
                            @foreach ($perception->sihaes as $sihae)
                            <br>
                                {{$sihae->clave}}    
                                {{$sihae->nombre}}
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection