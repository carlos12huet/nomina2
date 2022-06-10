@extends('layouts.app')

@section('template_title')
    Crear Subsidio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Subsidio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('subsidy.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('subsidy.form')
                            <div class="box-footer mt20">
                                <button type="submit" class="btn mt-2 btn-primary">Guardar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection