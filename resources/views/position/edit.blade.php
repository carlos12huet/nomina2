@extends('layouts.app')

@section('template_title')
    Actualizar Puesto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Puesto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('position.update', $position->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('position.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection