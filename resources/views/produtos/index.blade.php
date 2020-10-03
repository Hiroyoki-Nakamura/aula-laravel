@extends('layout.site')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="container">
        <div class="row mt-5 mb-2">
            <div class="col-9">
        <h3>Estoque de Produtos</h3>
            </div>
            <div class="col-3">
            <a class="btn btn-success" href="{{ route('adicionar') }}">
                Adicionar</a>
            </div>
        </div>
        <div class="row">
            <div class="="col-12>
        @if(!empty($mensagem))
        <div class="alert alert-success">{{ $mensagem }}
        </div>
        @endif
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Imagem</th>
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
                            <td>
                             <img width="50" src="{{ asset($produto->imagem)}}">

                            </td> 
                            <td>{{ $produto->publicado }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('editar', $produto->id )}}">Editar</a>
                            <form action="{{ route('deletar' , $produto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary">Excluir</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection