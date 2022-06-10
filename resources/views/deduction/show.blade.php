@extends('layouts.app')

@section('template_title')
    {{ $deduction->nombre ?? 'Deduccion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Deduccion: {{$deduction->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('deduction.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $deduction->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $deduction->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            <br>
                            @switch($deduction->tipo)
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
                            <strong>Percepciones SAT: </strong>
                            @if ($deduction->satdeduction == null)
                                <br>
                            @else

                            
                            <br>
                            {{$deduction->satdeduction->clave}}
                            {{$deduction->satdeduction->nombre}}
                            @endif
                            <br>
                            <br>
                            <strong>SIHAE: </strong>
                            @foreach ($deduction->sihaes as $sihae)
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
