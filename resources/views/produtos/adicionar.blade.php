@extends('layout.site')

@section('nome', 'Adicionar Produto')


@section('conteudo')
    <div class="container">
        <h3>Adiconar Produtos</h3>
        <div class="row">
            <form action="{{ route('salvar') }}" method="post">
                @csrf
                @include('produtos.form')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection()