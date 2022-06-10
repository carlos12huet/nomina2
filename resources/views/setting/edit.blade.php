@extends('layouts.app')

@section('template_title')
    Actualizar Registro
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Registro</span>
                    </div>
                    <div class="card-body">
                        {!! Form::model($setting, ['route'=>['setting.update',$setting],'autocomplete'=>'off', 'files' => true, 'method'=>'patch']) !!}
                            @include('setting.form')
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection