@extends('layouts.app')

@section('template_title')
    {{ $isrdetail->isr->clave ?? 'ISR' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Clave: {{$isrdetail->isr->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('isrdetail.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>clave:</strong>
                            {{ $isrdetail->clave }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $isrdetail->descripcion }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>status:</strong>
                            {{$isrdetail->status ? 'activo' : 'inactivo' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
