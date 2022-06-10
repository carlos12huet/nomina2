@extends('layouts.app')

@section('template_title')
    Crear Tabulacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Tabulacion</span>
                        <a href="{{ route('tabdetail.import') }}" class="btn btn-secondary btn-sm float-right mx-4"  data-placement="left">
                            {{ __('Importar') }}
                        </a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tabdetail.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('tabdetail.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection