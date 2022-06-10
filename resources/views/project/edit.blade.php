@extends('layouts.app')

@section('template_title')
    Actualizar Proyecto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Proyecto</span>
                    </div>
                    <div class="card-body">
                        {!! Form::model($project, ['route'=>['project.update',$project],'autocomplete'=>'off', 'files' => true, 'method'=>'patch']) !!}
                            @include('project.form')
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection