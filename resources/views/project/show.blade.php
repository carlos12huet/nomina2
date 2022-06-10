@extends('layouts.app')

@section('template_title')
    {{ $project->nombre ?? 'Proyecto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Proyecto: {{$project->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('project.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $project->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto </strong>
                            {{ $project->nombre }}
                            <br>
                            <br>
                            <strong>Ubicados en </strong>
                            @foreach ($project->municipalities as $proyect)
                            <br>    
                                {{$proyect->nombre}}
                            @endforeach
                            <br>
                            <br>
                            <strong>En departamentos </strong>
                            @foreach ($project->departments as $proyect)
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
