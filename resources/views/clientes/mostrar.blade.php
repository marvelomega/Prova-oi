@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="pull-left">
                <h1>Informações do Cliente</h1>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Id</th>
                    <th colspan="2">Nome</th>
                    <th>Galc</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$cliente->id}}</td>
                        <td colspan="2">{{$cliente->nome}}</td>
                        <td>{{$cliente->galc}}</td>
                    </tr>
                </tbody>
                <thead>
                    <th colspan="4">Endereço</th>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4">{{$cliente->endereco}}</td>
                    </tr>
                </tbody>
                <thead>
                    <th>Porta</th>
                    <th>Velocidade</th>
                    <th>Ativo</th>
                    <th>Data de Cadastro</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$cliente->galc}}</td>
                        <td>{{$cliente->velocidade}}</td>
                        <td>{{$cliente->ativo==1?'Sim':'Não'}}</td>
                        <td>{{date_format($cliente->created_at,'d/m/Y H:i:s')}}</td>
                    </tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col-sm-12 text-right">
                    <br>
                    <a href="{!! route('cliente.editar', [$cliente->id]) !!}" class="btn btn-primary" title="Editar">
                                    <i class="fa fa-pencil"></i> Editar
                                </a>
                    <a href="{!! route('cliente.index') !!}" class="btn btn-secondary">
                        <i class="fa fa-arrow-circle-left"></i> Voltar
                    </a>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection


