@extends('layouts.app')

@section('template_title')
    Crear regimen
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title ">Crear regimen</span>
                        <div class="float-rigth">
                            <a class="btn btn-primary my-2" href="{{ route('regime.index') }}"> Regresar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('regime.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('regime.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection