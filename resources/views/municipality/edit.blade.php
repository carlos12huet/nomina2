@extends('layouts.app')

@section('template_title')
    Actualizar Municipio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Municipio</span>
                    </div>
                    <div class="card-body">
                        
                            {!! Form::model($municipality, ['route'=>['municipality.update',$municipality],'autocomplete'=>'off', 'files' => true, 'method'=>'patch']) !!}
                            @include('municipality.form')
                            {{Form::close()}}
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection