@extends('layouts.app')

@section('template_title')
    Actualizar Departamento
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Departamento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('department.update', $department->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('department.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection