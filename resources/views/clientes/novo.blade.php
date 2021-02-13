@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>Novo Cliente</h1>
            {!! Form::open(['route' => 'cliente.salvar', 'id'=>'formCliente', 'files' => true ]) !!}

            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('nome', 'Nome do Endereço:', ['class' => 'control-label']) !!}
                    {!! Form::text('nome', null, ['class' => 'form-control', 'required'=>'','maxlength'=>'50' ]) !!}
                    <small id="emailHelp" class="form-text text-muted">Tamanho máximo: 50 caracteres.</small>
                </div>

                <div class="col-md-6">
                    {!! Form::label('galc', 'Galc:', ['class' => 'control-label']) !!}
                    {!! Form::text('galc', null, ['class' => 'form-control', 'required'=>'','maxlength'=>'50' ]) !!}
                    <small id="emailHelp" class="form-text text-muted">Tamanho máximo: 50 caracteres.</small>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {!! Form::label('endereco', 'Endereço:', ['class' => 'control-label']) !!}
                    {!! Form::text('endereco', null, ['class' => 'form-control', 'required'=>'','maxlength'=>'100' ]) !!}
                    <small id="emailHelp" class="form-text text-muted">Tamanho máximo: 100 caracteres.</small>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    {!! Form::label('porta', 'Porta:', ['class' => 'control-label']) !!}
                    {!! Form::number('porta', null, ['class' => 'form-control', 'required'=>'','maxlength'=>'100' ]) !!}
                    <!-- <small id="emailHelp" class="form-text text-muted">Tamanho máximo: 100 caracteres.</small> -->
                </div>
                <div class="col-md-4">
                    {!! Form::label('velocidade', 'Velocidade:', ['class' => 'control-label']) !!}
                    {!! Form::number('velocidade', null, ['class' => 'form-control', 'required'=>'','maxlength'=>'100' ]) !!}
                    <!-- <small id="emailHelp" class="form-text text-muted">Tamanho máximo: 100 caracteres.</small> -->
                </div>

                <div class="col-md-4">
                    {!! Form::label('ativo', 'Cliente Ativo?:', ['class' => 'control-label']) !!}
                    {!! Form::select('ativo', array('1' => 'Sim', '0' => 'Não'), null, ['class' => 'form-control', 'required'=>'','maxlength'=>'100' ]) !!}
                    <!-- <small id="emailHelp" class="form-text text-muted">Tamanho máximo: 100 caracteres.</small> -->
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 text-right">
                    <br>
                    {!! Form::button('<i class="fa fa-save"></i> Salvar', ['type' => 'submit', 'class' => 'btn btn-success'])  !!}
                    <a href="{!! route('cliente.index') !!}" class="btn btn-secondary">
                        <i class="fa fa-arrow-circle-left"></i> Cancelar
                    </a>
                </div>
            </div>


            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection


