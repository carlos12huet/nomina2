@extends('layouts.app')

@section('template_title')
    Nomina
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('payroll.index') }}"> Regresar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('paydetail.exportable') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                {{ Form::label('Ingrese nomina') }}
<br>
                                {{ Form::select('payroll_id',$payrolls, ['class' => 'form-control' . ($errors->has('$payroll_id') ? ' is-invalid' : ''), 'placeholder' => 'Nomina']) }}
                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn mt-2 btn-secondary">Exportar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
