@extends('layouts.app')

@section('template_title')
    Actualizar Tabulacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Tabulacion</span>
                    </div>
                    <div class="card-body">
                        {!! Form::model($tabdetail, ['route'=>['tabdetail.update',$tabdetail],'autocomplete'=>'off', 'files' => true, 'method'=>'patch']) !!}
                            @include('tabdetail.form')
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection