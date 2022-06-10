@extends('layouts.app')

@section('template_title')
    Actualizar Percepcion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Percepcion</span>
                    </div>
                    <div class="card-body">
                        {{ Form::model($perception, ['route'=>['perception.update',$perception],'autocomplete'=>'off', 'files' => true, 'method'=>'patch']) }}
                            @include('perception.form')
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection