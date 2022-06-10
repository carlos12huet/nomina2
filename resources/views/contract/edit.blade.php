@extends('layouts.app')

@section('template_title')
    Actualizar Contrato
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Contrato</span>
                    </div>
                    <div class="card-body">
                        {!! Form::model($contract, ['route'=>['contract.update',$contract], 'autocomplete'=>'off', 'files' => true, 'method'=>'put']) !!}
                            @include('contract.form')
                            
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection