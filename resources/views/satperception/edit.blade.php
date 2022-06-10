@extends('layouts.app')

@section('template_title')
    Actualizar Percepcion SAT
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Percepcion SAT</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('satperception.update', $satperception->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('satperception.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection