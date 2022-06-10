@extends('layouts.app')

@section('template_title')
    Crear Registro
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Registro</span>
                        <a href="{{ route('setting.import') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                            {{ __('Importar') }}
                        </a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('setting.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('setting.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection