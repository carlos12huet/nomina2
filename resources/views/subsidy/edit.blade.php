@extends('layouts.app')

@section('template_title')
    Actualizar Subsidio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Subsidio</span>
                    </div>
                    <div class="card-body">
                        {!! Form::model($subsidy, ['route'=>['subsidy.update',$subsidy],'autocomplete'=>'off', 'files' => true, 'method'=>'patch']) !!}
                            @include('subsidy.form')
                            <div class="box-footer mt20">
                                <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
                            </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection