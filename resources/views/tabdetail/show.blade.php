@extends('layouts.app')

@section('template_title')
    Tabulacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Tabulacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('tabdetail.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Puesto:</strong>
                            {{$tabdetail->position->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tabulador:</strong>
                            {{$tabdetail->tab->clave }}
                        </div>
						<div class="form-group">
                            <strong>Sueldo Diario:</strong>
                            {{$tabdetail->sueldo_diario }}
                        </div>
                        <div class="form-group">
                            <strong>Sueldo Mensual:</strong>
                            {{$tabdetail->sueldo_mensual }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
