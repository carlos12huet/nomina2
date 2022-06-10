@extends('layouts.app')

@section('template_title')
    Actualizar Deduccion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Deduccion</span>
                    </div>
                    <div class="card-body">
                        {{ Form::model($deduction, ['route'=>['deduction.update',$deduction],'autocomplete'=>'off', 'method'=>'patch']) }}
                            @include('deduction.form')
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection