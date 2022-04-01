@extends('layouts.app')

@section('template_title')
    Actualizar trabajador
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar trabajador</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('worker.update', $worker->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('worker.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection