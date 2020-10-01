<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $req)
    {
        $produtos = Produto::all();

        $mensagem = $req->session()->get('mensagem');

        return view('produtos.index', compact('produtos', 'mensagem'));
    }

    public function adicionar()
    {
        return view('produtos.adicionar');
    }

    public function salvar(Request $req)
    {
        // $produto = $req->all();
        
        // if($req->hasFile('imagem')){
        //     $imagem = $req ->file('imagem');
        //     $num = rand(1111, 9999);
        //     $dir = 'img/produtos/';
        //     $ext = $imagem->guessClientExtension();
        //     $nomeImagem = 'imagem_' . $num . '.' . $ext;
        //     $imagem->move($dir, $nomeImagem);
        //     $produto['imagem'] = $dir . $nomeImagem;
        // }

        Produto::create($req->all());

        $req->session()->flash('mensagem', "$req->categoria $req->nome adicionado com sucesso!");

        return redirect()->route('produto');
    }

    public function editar($id)
    {
        $produto = Produto::find($id);
        return view('produtos.editar', compact('produto'));
    }

    public function atualizar(Request $req, $id)
    {
        $requisicao = $req->all();
        $produto = Produto::find($id);
        $produto->update($requisicao);

        $req->session()->flash('mensagem', "$produto->categoria $produto->nome atualizado com sucesso!");

        return redirect()->route('produto');
    }

    public function deletar(Request $req, $id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        // Produto::find($id)->delete();
        $req->session()->flash('mensagem', "$produto->categoria $produto->nome excluido com sucesso!");
        return redirect()->route('produto');
    }
}
