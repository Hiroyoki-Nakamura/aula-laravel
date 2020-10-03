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
        $produto = $req->all();

        if (isset($produto['publicado'])) {
            $produto['publicado'] = 'sim';
        }
        
        if ($req->hasFile('imagem')){
            $produto['imagem'] = $this->tratarImagem($req, $produto);
        }

        Produto::create($produto);

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
        $produto = $req->all();

        if(isset($produto['publicado'])){
            $produto['publicado'] = 'sim';
        }else{
            $produto['publicado'] = 'nao';
        }

        if($req->hasFile('imagem')){
            $produto['imagem'] = $this->tratarImagem($req, $produto);
        }

        $produtoSelecionado = Produto::find($id);
        $produtoSelecionado->update($produto);

        $req->session()->flash('mensagem', "$produtoSelecionado->categoria $produtoSelecionado->nome atualizado com sucesso!");

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

    public function tratarImagem(Request $req, $produto)
    {
        $imagem = $req->file('imagem');
        $num = rand(1111, 9999);
        $dir = 'public/imgProdutos/';
        $ext = $imagem->guessClientExtension();
        $nomeImagem = 'imagem_' . $num . '.' . $ext;
        $imagem->move($dir, $nomeImagem);

        return $dir . $nomeImagem;
    }
}
