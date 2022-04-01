@extends('layouts.app')

@section('template_title')
    Actualizar regimen
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar regimen</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('regime.update', $regime->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('regime.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection