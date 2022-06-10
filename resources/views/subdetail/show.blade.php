@extends('layouts.app')

@section('template_title')
    {{ $subdetail->subsidy->clave ?? 'Subsidio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Subsidio: {{$subdetail->subsidy->clave}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary my-2" href="{{ route('subdetail.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <table class="table table-bordered table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>
                                    <th>desde</th>
                                    <th>hasta</th>
                                    <th>cantidad</th>
                                    <th>Creado</th>
                                    <th>Actualizado</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td>{{$subdetail->id}}</td>
                                        <td>{{$subdetail->desde }}</td>
                                        <td>{{$subdetail->hasta }}</td>
                                        <td>{{$subdetail->cantidad }}</td>
                                        <td>{{$subdetail->created_at}}</td>
                                        <td>{{$subdetail->updated_at}}</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
