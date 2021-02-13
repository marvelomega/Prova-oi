@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="pull-left">
            <h1>Lista de Clientes Ativos</h1>
            </div>
            <div class="pull-right">
                <a target="_blank" class="btn btn-success btn-sm" style="margin-bottom: 5px;margin-right: 10px" href="{!! route('cliente.excel') !!}">
                    <i class="fa fa-file-excel-o"></i> Exportar em Excel
                </a>

                <a target="_blank" class="btn btn-danger btn-sm" style="margin-bottom: 5px" href="{!! route('cliente.pdf') !!}">
                    <i class="fa fa-file-pdf-o"></i> Exportar em PDF
                </a>
            </div>

            <table class="table table-striped table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Galc</th>
                    <th>Ativo?</th>
                    <th>Data de Cadastro</th>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nome}}</td>
                            <td>{{$cliente->galc}}</td>
                            <td>{{$cliente->ativo==1?'Sim':'Não'}}</td>
                            <td>{{date_format($cliente->created_at,'d/m/Y H:i:s')}}</td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <i>Sem informações</i>
                        </td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>
@endsection


