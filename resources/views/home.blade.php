@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-8">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Bienvenido') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Que tengas un buen dia!') }}
                    <div>
                        <script>
                            date = new Date().toLocaleDateString();
                            document.write(date);
                        </script>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<style>
    style="background-image: url('https://imagenescityexpress.scdn6.secure.raxcdn.com/sites/default/files/inline-images/Visita%20el%20Can%CC%83o%CC%81n%20del%20Sumidero%2C%20maravilla%20natural%20de%20Chiapas%201.jpg')"
</style>-->
@endsection
