@extends('layouts.app')

@section('template_title')
    Actualizar Tabuladaor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Tabulador</span>
                    </div>
                    <div class="card-body">
                        {!! Form::model($tab, ['route'=>['tab.update',$tab],'autocomplete'=>'off', 'files' => true, 'method'=>'patch']) !!}
                            @include('tab.form')
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection