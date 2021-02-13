@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('flash::message')
            <div class="pull-left">
                <h1>Lista de Clientes</h1>
            </div>
            <a class="btn btn-success pull-right btn-sm" style="margin-bottom: 5px" href="{!! route('cliente.novo') !!}">
                <i class="fa fa-plus-circle"></i> Novo
            </a>
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Galc</th>
                    <th>Ativo?</th>
                    <th>Data de Cadastro</th>
                    <th style="width: 200px" class="text-center">Ações</th>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nome}}</td>
                            <td>{{$cliente->galc}}</td>
                            <td>{{$cliente->ativo==1?'Sim':'Não'}}</td>
                            <td>{{date_format($cliente->created_at,'d/m/Y H:i:s')}}</td>
                            <td class="text-center">
                                <a href="{!! route('cliente.mostrar', [$cliente->id]) !!}" class="btn btn-sm btn-info" title="Mostrar">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{!! route('cliente.editar', [$cliente->id]) !!}" class="btn btn-sm btn-primary" title="Editar">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                {!! Form::open(['route' => ['cliente.excluir', $cliente->id], 'method' => 'delete', 'style'=>'display: initial']) !!}
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Deseja excluir o cliente?')"]) !!}
                                {!! Form::close() !!}

                                @if($cliente->ativo==1)
                                    <a href="{!! route('cliente.desativar', [$cliente->id]) !!}" class="btn btn-sm btn-warning" title="Desativar">
                                        <i class="fa fa-ban"></i>
                                    </a>
                                @else
                                    <a href="{!! route('cliente.ativar', [$cliente->id]) !!}" class="btn btn-sm btn-warning" title="Ativar">
                                        <i class="fa fa-star"></i>
                                    </a>
                                @endif

                            </td>
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


