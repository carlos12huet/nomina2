@extends('layouts.app')

@section('template_title')
    Actualizar trabajador
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar trabajador</span>
                    </div>
                    <div class="card-body">
                            {!! Form::model($worker, ['route'=>['worker.update',$worker],'autocomplete'=>'off', 'files' => true, 'method'=>'patch']) !!}
                            @include('worker.form')
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection