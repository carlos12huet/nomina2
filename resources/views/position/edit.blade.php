@extends('layouts.app')

@section('template_title')
    Actualizar Puesto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Puesto</span>
                    </div>
                    <div class="card-body">
                        {!! Form::model($position, ['route'=>['position.update',$position],'autocomplete'=>'off', 'files' => true, 'method'=>'patch']) !!}
                            @include('position.form')
                            {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection