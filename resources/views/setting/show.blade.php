@extends('layouts.app')

@section('template_title')
    {{ $setting->nombre ?? 'Registro' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Registro {{$setting->nombre}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('setting.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $setting->nombre }}
                        </div>

                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $setting->valor }}
                        </div>

                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $setting->status }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
