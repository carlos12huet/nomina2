@extends('layouts.app')

@section('template_title')
    {{ $department->nombre ?? 'Departamento' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Departamento: {{$department->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('department.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $department->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $department->nombre }}
                        </div>
                        <div class="form-group">
                            <br>
                            <br>
                            <strong>Ubicados en </strong>
                            @foreach ($department->projects as $proyect)
                            <br>    
                                {{$proyect->nombre}}
                            @endforeach
                        </div>
                        <div class="form-group">
                            <br>
                            <br>
                            <strong>Con Puestos </strong>
                            @foreach ($department->positions as $position)
                            <br>    
                                {{$position->nombre}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
