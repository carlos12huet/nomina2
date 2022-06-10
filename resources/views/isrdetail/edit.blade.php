@extends('layouts.app')

@section('template_title')
    Actualizar dato ISR
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar dato ISR</span>
                    </div>
                    <div class="card-body">
                        {!! Form::model($isrdetail, ['route'=>['isrdetail.update',$isrdetail],'autocomplete'=>'off', 'files' => true, 'method'=>'patch']) !!}
                            @include('isrdetail.form')
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