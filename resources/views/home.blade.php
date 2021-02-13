@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Acesso Rápido ') }} 
                    
                </div>

                <div class="card-body">
                    <a class="btn btn-success btn-sm" href="{{ url('/clientes') }}">
                        Clientes
                    </a>
                    <a class="btn btn-success btn-sm" href="{{ url('/clientes-ativos') }}">
                        Relatórios de Clientes ativos
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection


