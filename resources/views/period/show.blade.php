@extends('layouts.app')

@section('template_title')
    {{ $period->nombre ?? 'Regimen Fiscal' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Regimen Fiscal{{$period->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('period.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $period->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $period->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
