@extends('layouts.app')

@section('template_title')
    {{ $worker->nombre ?? 'Trabajador' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Trabajador: {{$worker->nombre}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('worker.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $worker->nombre }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>RFC:</strong>
                            {{ $worker->rfc }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>NSS:</strong>
                            {{ $worker->nss }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>CURP:</strong>
                            {{ $worker->curp }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $worker->correo }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>status:</strong>
                            {{$worker->status ? 'activo' : 'inactivo' }}
                        </div>
                        <br>
                        <div>
                            <a class="btn btn-sm btn-success" href="{{ route('worker.edit',$worker->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
