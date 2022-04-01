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
                        <form method="POST" action="{{ route('project.update', $project->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('project.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection