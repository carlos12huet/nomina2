@extends('layouts.app')

@section('template_title')
    Crear Tabla subsidio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Tabla Subsidio</span>
                        <a href="{{ route('subdetail.import') }}" class="btn btn-secondary btn-sm float-right mx-4"  data-placement="left">
                            {{ __('Importar') }}
                        </a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('subdetail.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('subdetail.form')
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