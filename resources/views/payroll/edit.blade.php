@extends('layouts.app')

@section('template_title')
    Actualizar Payroll
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Payroll</span>
                    </div>
                    <div class="card-body">
                        {!! Form::model($payroll, ['route'=>['payroll.update',$payroll],'autocomplete'=>'off', 'files' => true, 'method'=>'patch']) !!}
                        
                            @csrf
                            @include('payroll.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection