<h1>Conteudo</h1>

@extends('layout.site')

@section('title', 'Produtos')
    
@section('conteudo')
@foreach($produtos as $produto)
<p>Nome: {{$produto->vinho}} Uva: {{$produto->uva}} Tipo: {{$produto->tipo}}</p>
@endforeach
@endsection