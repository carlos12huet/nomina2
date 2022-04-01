@extends('layouts.app')

@section('template_title')
    Actualizar jornada
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar jornada</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('workday.update', $workday->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('workday.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection