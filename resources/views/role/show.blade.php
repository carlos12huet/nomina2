@extends('layouts.app')

@section('template_title')
    Rol
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Rol</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('role.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Rol:</strong>
                            {{ $role->rol }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $role->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
