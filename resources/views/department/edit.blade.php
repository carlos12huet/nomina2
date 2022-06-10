@extends('layouts.app')

@section('template_title')
    Actualizar Departamento
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Departamento</span>
                    </div>
                    <div class="card-body">
                        {!! Form::model($department, ['route'=>['department.update',$department],'autocomplete'=>'off', 'files' => true, 'method'=>'patch']) !!}
                            @include('department.form')
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection