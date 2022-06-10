@extends('layouts.app')

@section('template_title')
    Importar de Excel
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Importar</span>
                    </div>
                    <div class="card-body">
                        @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{$error}}
                            @endforeach
                        </div>
                        @endif
                        <form method="POST" action="{{ route('satdeduction.saveimport') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            {!! Form::file('import', ['class' => 'form-control']) !!}
                            <br>
                            <button class="btn btn-primary" type="submit">Importar</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection