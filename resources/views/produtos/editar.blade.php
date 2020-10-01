@extends('layout.site')

@section('nome', 'Editar Produto')


@section('conteudo')
    <div class="container">
        <h3>Editar Produtos</h3>
        <div class="row">
            <form action="{{ route('atualizar', $produto->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                @include('produtos.form')
                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
@endsection()