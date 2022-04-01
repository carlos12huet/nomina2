@extends('layouts.app')

@section('template_title')
    Actualizar periodicidad de pago
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar periodicidad de pago</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('period.update', $period->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('period.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection