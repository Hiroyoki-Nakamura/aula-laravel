@extends('layout.site')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="container">
        <h3>Carrinho Produtos</h3>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Publicado</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->categoria }}</td>
                            <td>{{ $produto->valor }}</td>
                            <td>{{ $produto->publicado }}</td>
                            <td>
                                <a class="btn btn-primary">Adicionar</a>
                                <a class="btn btn-secondary">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn btn-success" href="{{ route('adicionar') }}">Adicionar</a>
        </div>
    </div>
@endsection