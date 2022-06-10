@extends('layouts.app')

@section('template_title')
    Crear Percepcion SAT
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Percepcion SAT</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('satperception.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('satperception.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection